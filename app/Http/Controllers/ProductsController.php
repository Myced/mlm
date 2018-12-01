<?php

namespace App\Http\Controllers;

use Session;
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
        // $this->validate($request, [
        //     'product-name' => 'required',
        //     'price' => 'required',
        //
        // ]);

        $product = new Product;

        //save product properties
        $product->category_id = $request->category;
        $product->brand_id = $request->brand;
        $product->code = rand(400, 1000);
        $product->name = $request->product_name;
        $product->slug = str_slug($request->product_name);
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->published = true ? isset($request->published) : false;
        $product->description = $request->description;
        $product->description_long = $request->description_long;
        $product->thumbnail = "/uploads/products/thumbnails/product.png";
        $product->image = "/uploads/products/images/product.png";

        //save the product
        $product->save();

        //toast message
        Session::flash('success', 'Product Added');
        return back();
    }
}
