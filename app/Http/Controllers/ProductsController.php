<?php

namespace App\Http\Controllers;

use App\Admin\Brand;
use App\Admin\Product;
use App\Admin\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return view('admin.products');
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.add_product', compact(['categories', 'brands']));
    }

    public function store(Request $request)
    {
        
    }
}
