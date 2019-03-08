<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Classes\OrderManager;

class UserPanelController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function orders()
    {
        $orders = $this->getOrders();

        return view('user.orders', compact('orders'));
    }

    public function orderDetail($code)
    {
        $order = Order::where('order_code', '=', $code)->first();

        return view('user.order_detail', compact('order'));

    }

    private function getOrders()
    {
        $user = $this->getUser();

        return $orders = $user->orders;
    }

    private function getUser()
    {
        if(!auth()->user())
        {
            return redirect()->route('login');
        }
        else {
            return auth()->user();
        }
    }
}
