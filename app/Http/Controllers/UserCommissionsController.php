<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserCommissionsController extends Controller
{
    public function index()
    {
        $commissions = auth()->user()->commissions;

        return view('user.commissions', compact('commissions'));
    }
}
