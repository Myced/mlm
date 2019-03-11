<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorsController extends Controller
{
    public function index()
    {
        return ;
    }

    public function error401()
    {
        return view('admin.errors.401');
    }
}
