<?php

namespace App\Http\Controllers;

use App\Functions;
use App\Models\Order;
use App\Models\OrderLog;
use App\Events\OrderPaid;
use App\Models\UserPayout;
use App\Classes\MomoParser;
use App\Classes\MomoPayout;
use Illuminate\Http\Request;
use App\Classes\MomoProcessor;
use App\Models\OrderCommission;
use App\Notifications\CommissionPaid;

class PaymentController extends Controller
{
    private $momoEmail = 'tncedric@yahoo.com';

    public function momo(Request $request)
    {
        $number = $request->number;
        $order_code = $request->order;
        $order = $this->getOrder($order_code);
        $amount = $order->total;

        $momoEmail = $this->momoEmail;

        if($order->payment_status == true)
        {
            $response = [
                'status' => true,
                'message' => "You have already paid for this order"
            ];

            return $response;
        }

        $processor = new MomoProcessor($number, $amount, $momoEmail);
        $response = $processor->pay();

        if($response != false)
        {
            $parser = new MomoParser($response);
            $parser->parse();
            $log = $parser->logResult($order, $number, $momoEmail);

            //if the result is successful, then update order status
            if($parser->success)
            {
                $order->payment_id = $log->id;
                $order->payment_status = true;
                $order->status = \App\OrderStatus::PROCESSING;
                $order->payment_method = \App\PaymentMethods::MTN_MOMO;

                $order->save();

                $this->logPayment($order);

                //raise and event for order paid
                event(new OrderPaid($order));
            }

            $response = [
                'status' => $parser->success,
                'message' => $parser->message
            ];
        }
        else {
            $response = [
                'status' => false,
                'message' => "Server cannot process Payment at this time"
            ];

            return $response;
        }

        return $response;
    }

    public function orange(Request $request)
    {
        $number = $request->number;
        $order_code = $request->order;

        $order = $this->getOrder($code);
        $amount = $order->total;
    }

    public function payoutMomo(Request $request)
    {
        $payoutId = $request->payoutId;

        $payout = UserPayout::find($payoutId);
        $user = $payout->user;

        $number = Functions::getTel($user->userData->payout_number);

        $amount = $payout->amount;

        $momoEmail = $this->momoEmail;

        if(empty($number))
        {
            $response = [
                'status' => true,
                'message' => "This user has not set up the payout number"
            ];

            return $response;
        }

        if($payout->paid == true)
        {
            $response = [
                'status' => true,
                'message' => "This Payout has already been made"
            ];

            return $response;
        }

        $processor = new MomoPayout($number, $amount, $momoEmail);
        $response = $processor->pay();

        if($response != false)
        {
            $parser = new MomoParser($response);
            $parser->parse();
            $log = $parser->logPayout($payout, $momoEmail);

            //if the result is successful, then update order status
            if($parser->success)
            {
                $payout->paid = true;
                $payout->paid_at  = \Carbon\Carbon::now();

                /* set failure to false
                  it might have been set to true if the first attempt
                  was unsuccessful .
                */
                $payout->failed_at  = null;
                $payout->error_message = null;

                $payout->save();

                //raise and event for order paid
                //just notify the user directly
                $user->notify(new CommissionPaid($payout));

                //grab the users commission and set them to paid.
                $commissionsArray = explode(',', $payout->commissions);

                foreach($commissionsArray as $commissionId)
                {
                    $commission = OrderCommission::find($commissionId);

                    $commission->markAsPaid();
                }
            }
            else {
                $payout->failed_at  = \Carbon\Carbon::now();
                $payout->error_message = $parser->message;

                $payout->save();
            }

            $response = [
                'status' => $parser->success,
                'message' => $parser->message
            ];
        }
        else {
            $response = [
                'status' => false,
                'message' => "Server cannot process Payment at this time"
            ];

            return $response;
        }

        return $response;
    }

    private function getOrder($code)
    {
        return Order::where('order_code', '=', $code)->first();
    }

    private function logPayment($order)
    {
        $orderLog = new OrderLog;

        $orderLog->order_id = $order->id;
        $orderLog->user_id = $order->user_id;
        $orderLog->tag = "Payment";
        $orderLog->name = $order->user->name;
        $orderLog->description = "Payment Completed";
        $orderLog->class = "success";
        $orderLog->icon = "check";

        $orderLog->save();
    }
}
