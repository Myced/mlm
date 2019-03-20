<?php

namespace App\Http\Controllers;

use App\Classes\Dashboard;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
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
