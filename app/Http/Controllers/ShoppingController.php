<?php

namespace App\Http\Controllers;

use App\Admin\Product;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function index()
    {
        return ('index');
    }

    public function productsCategory($category)
    {
        dd($category);
    }
}
