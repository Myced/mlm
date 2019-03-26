<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLog;
use App\Events\OrderPaid;
use App\Classes\MomoParser;
use Illuminate\Http\Request;
use App\Classes\MomoProcessor;

class PaymentController extends Controller
{
    public function momo(Request $request)
    {
        $number = $request->number;
        $order_code = $request->order;
        $order = $this->getOrder($order_code);
        $amount = $order->total;

        $momoEmail = 'tncedric@yahoo.com';

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

        return $response;
    }

    public function orange(Request $request)
    {
        $number = $request->number;
        $order_code = $request->order;

        $order = $this->getOrder($code);
        $amount = $order->total;
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
