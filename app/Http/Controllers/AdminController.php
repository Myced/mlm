<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
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
