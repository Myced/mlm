<?php

namespace App\Http\Controllers;

use App\Admin\Product;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function index()
    {
        $products = $this->getProducts();


        return view('site.products', compact('products'));
    }

    public function productsCategory($category)
    {
        dd($category);
    }

    public function getProducts()
    {
        $products = Product::where('published', '=', true)
                            ->paginate();

        return $products;
    }

    public function view($slug)
    {
        
    }
}
