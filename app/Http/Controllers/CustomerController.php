<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::latest()->get();

        return view('admin.customers', compact('customers'));
    }

    public function view(User $user)
    {
        // dd($user->orders->sum('total'));
        return view('admin.customer', compact('user'));
    }
}
