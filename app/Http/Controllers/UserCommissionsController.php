<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderCommission;

class UserCommissionsController extends Controller
{
    public function index()
    {
        $commissions = OrderCommission::where('user_id', '=', auth()->user()->id)
                                        ->orderBy('id', 'desc')
                                        ->get();

        return view('user.commissions', compact('commissions'));
    }
}
