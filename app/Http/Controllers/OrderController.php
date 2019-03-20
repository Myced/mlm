<?php

namespace App\Http\Controllers;

use App\OrderStatus;
use App\Models\Order;
use App\Models\OrderLog;
use Illuminate\Http\Request;
use App\Events\OrderCancelled;

class OrderController extends Controller
{
    public function payment($code)
    {
        $order = $this->getOrder($code);

        //return view to select payment methdo.
        return view("user.order_payment", compact('order'));
    }

    public function confirm($code)
    {
        $order  = $this->getOrder($code);

        //check that the user has the permission
        //to update this order
        $perm = $this->checkPermission($order);

        if($perm['status'] == true)
        {
            //confirm the order
            $status  = OrderStatus::CONFIRMED;

            $order->updateStatus($status);

            //place a log
            $this->logConfirmation($order);

            //raise an event.

            session()->flash('success', 'Your order has been confirmed');

        }
        else {
            session()->flash('error', $perm['message']);
        }


        return back();
    }

    public function cancel($code)
    {
        $order  = $this->getOrder($code);

        //check that the user has the permission
        //to update this order
        $perm = $this->checkPermission($order);

        if($perm['status'] == true)
        {
            //cancel the order
            $status  = OrderStatus::CANCELED;

            $order->updateStatus($status);

            $this->logCancellation($order);

            //fire order cancelled event
            event(new OrderCancelled($order));

            session()->flash('info', 'Your order has been canceled');

        }
        else {
            session()->flash('error', $perm['message']);
        }

        return back();
    }

    private function getOrder($code)
    {
        return Order::where('order_code', '=', $code)->first();
    }

    private function logConfirmation($order)
    {
        $orderLog = new OrderLog;

        $orderLog->order_id = $order->id;
        $orderLog->user_id = auth()->user()->id;
        $orderLog->tag = "Confirmation";
        $orderLog->name = auth()->user()->name;
        $orderLog->description = "The Order was confirmed";
        $orderLog->class = "success";
        $orderLog->icon = 'check';

        $orderLog->save();
    }

    private function logCancellation($order)
    {
        $orderLog = new OrderLog;

        $orderLog->order_id = $order->id;
        $orderLog->user_id = auth()->user()->id;
        $orderLog->tag = "Cancellation";
        $orderLog->name = auth()->user()->name;
        $orderLog->description = "Order was cancelled!";
        $orderLog->class = "danger";
        $orderLog->icon = 'times';

        $orderLog->save();
    }

    private function checkPermission($order)
    {
        $user = auth()->user();

        $result = [
            "status" => false,
            "message" => ""
        ];

        if(is_null($order))
        {
            $result['message'] = "Unknown order";

            return $result;
        }
        elseif($user->id != $order->user_id)
        {
            $result['message'] = "You do not have permission to perform this action";

            return $result;
        }
        else {
            $result['status'] = true;
            $result['message'] = "Success";

            return $result;
        }

    }
}
