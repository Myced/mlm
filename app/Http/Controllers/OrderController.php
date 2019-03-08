<?php

namespace App\Http\Controllers;

use App\OrderStatus;
use App\Models\Order;
use Illuminate\Http\Request;

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
        $this->checkPermission($order);

        //confirm the order
        $status  = OrderStatus::CANCELED;

        $order->updateStatus($status);

        session()->flash('info', 'Your order has been canceled');
        return back();
    }

    private function getOrder($code)
    {
        return Order::where('order_code', '=', $code)->first();
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
