<?php

namespace App\Http\Controllers;

use App\Models\Order;
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

        $processor = new MomoProcessor($number, $amount, $momoEmail);
        $response = $processor->pay();

        $parser = new MomoParser($response);
        $parser->parse();
        $parser->logResult($order, $number, $momoEmail);

        //if the result is successful, then update order status
        if($parser->success)
        {
            $order->payment_status = true;
            $order->status = \App\OrderStatus::PROCESSING;

            $order->save();
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
}
