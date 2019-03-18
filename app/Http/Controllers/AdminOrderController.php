<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLog;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();

        return view('admin.orders', compact('orders'));
    }

    public function view($code)
    {
        $order = $this->getOrder($code);

        return view('admin.order_detail', compact('order'));
    }

    public function log(Request $request, $code)
    {
        $order = $this->getOrder($code);
        $orderLog = new OrderLog;

        $orderLog->order_id = $order->id;
        $orderLog->user_id = auth()->user()->id;
        $orderLog->tag = $request->tag;
        $orderLog->name = auth()->user()->name;
        $orderLog->description = $request->description;
        $orderLog->class = $request->type;
        $orderLog->icon = OrderLog::getIcon($request->type);

        $orderLog->save();

        session()->flash('success', 'Order Log has been saved');

        return back();
    }

    private function getOrder($code)
    {
        return Order::where('order_code', '=', $code)->first();
    }
}
