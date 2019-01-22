<?php

namespace App\Http\Controllers;

use App\Admin\Brand;
use App\Admin\Product;
use App\Admin\Category;

use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function index()
    {
        $products = $this->getProducts();


        return view('site.products', compact('products'));
    }

    public function productsCategory($categorySlug)
    {
        $category = Category::where('slug', '=', $categorySlug)->first();

        $products = Product::where('category_id', '=', $category->id)->get();

        return view('site.product_categories', compact('products', 'category'));
    }

    public function productsBrand($brandSlug)
    {
        $brand = Brand::where('slug', '=', $brandSlug)->first();

        $products = Product::where('brand_id', '=', $brandSlug)->get();

        return view('site.product_brands', compact('products', 'brand'));
    }

    public function getProducts()
    {
        $products = Product::where('published', '=', true)
                            ->paginate();

        return $products;
    }

    public function view($slug)
    {
        //get the product from the slug
        $product = Product::where('slug', '=', $slug)->first();

        //add the product views
        $product->addView();

        //prepare the product images
        $images = [];

        return view('site.product', compact('product'));
    }

    public function cart()
    {
        return view('site.cart');
    }
}
