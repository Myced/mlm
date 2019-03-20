<?php

namespace App\Http\Controllers;

use App\Events\OrderPaid;
use App\Classes\Dashboard;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {

        $order = Order::find(14);
        event(new OrderPaid($order));
        
        $dashboard = new Dashboard;

        return view('admin.index', compact('dashboard'));
    }

    public function orders()
    {
        return view('admin.orders');
    }

    public function customer()
    {
        return view('admin.customer');
    }

    public function orderDetail()
    {
        return view('admin.order_detail');
    }
}
