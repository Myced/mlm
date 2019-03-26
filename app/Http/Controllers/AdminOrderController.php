<?php

namespace App\Http\Controllers;

use App\OrderStatus;
use App\Models\Order;
use App\Models\OrderLog;
use App\Classes\OrderStats;
use Illuminate\Http\Request;
use App\Classes\OrderManager;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        $stats = new OrderStats($orders);
        $title = "All Orders";

        return view('admin.orders', compact('orders', 'stats', 'title'));
    }

    public function view($code)
    {
        $order = $this->getOrder($code);

        return view('admin.order_detail', compact('order'));
    }

    public function today()
    {
        $orders = OrderManager::ordersToday();
        $stats = new OrderStats($orders);
        $title = "Orders Today";

        return view('admin.orders', compact('orders', 'stats', 'title'));
    }

    public function yesterday()
    {
        $orders = OrderManager::ordersYesterday();
        $stats = new OrderStats($orders);
        $title = "Orders Yesterday";

        return view('admin.orders', compact('orders', 'stats', 'title'));
    }

    public function thisWeek()
    {
        $orders = OrderManager::ordersThisWeek();
        $stats = new OrderStats($orders);
        $title = "Orders This Week";

        return view('admin.orders', compact('orders', 'stats', 'title'));
    }

    public function thisMonth()
    {
        $orders = OrderManager::ordersThisMonth();
        $stats = new OrderStats($orders);
        $title = "Orders This Month";

        return view('admin.orders', compact('orders', 'stats', 'title'));
    }

    public function updateStatus($code, $status)
    {
        $order = $this->getOrder($code);

        if($status == OrderStatus::DELIVERED)
        {
            $delivered_at = \Carbon\Carbon::now();
            $order->status = $status;
            $order->payment_status = true;
            $order->delivered_at = $delivered_at;

            $order->save();

            $this->logStatus($order, $status, true);

            session()->flash('Order has been delivered');
            return back();
        }

        $order->updateStatus($status);

        $this->logStatus($order, $status);

        $message = "Order Status has been set to " . $status;

        session()->flash('success', $message);

        return back();
    }

    private function logStatus($order, $status, $delivered = false)
    {
        $orderLog = new OrderLog;

        $orderLog->order_id = $order->id;
        $orderLog->user_id = auth()->user()->id;
        $orderLog->tag = "Status";
        $orderLog->name = auth()->user()->name;

        if($delivered)
        {
            $orderLog->description = "Order was delivered";
            $orderLog->class = "success";
            $orderLog->icon = "check";
            $orderLog->tag = "Delivery";
        }
        else {
            $orderLog->description = "Order Status Changed to " . $status;
            $orderLog->icon = "info-circle";
        }



        $orderLog->save();
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
