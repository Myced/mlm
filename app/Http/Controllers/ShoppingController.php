<?php

namespace App\Http\Controllers;

use Cookie;
use App\UserCookie;
use App\Admin\Brand;
use App\Admin\Product;
use App\Admin\Category;
use App\Classes\ShopManager;
use Illuminate\Http\Request;
use App\Classes\CookieManager;

class ShoppingController extends Controller
{
    public function index()
    {
        //validate user cookie
        $this->validateCookie();

        //check that the per page has been changed
        if(!is_null(request()->per_page))
        {
            $perPage = request()->per_page;
        }
        else {
            $perPage = 18;
        }
        // composer require hardevine/shoppingcart
        $products = $this->getProducts($perPage);
        $topProducts = ShopManager::topOrdered()->pluck('product_id');

        return view('site.products', compact('products', 'topProducts'));
    }

    private function validateCookie()
    {
        $cookieManager = new CookieManager;
        $cookieManager->setCookie();
        return;
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

    public function getProducts($perPage = 15)
    {
        $products = Product::where('published', '=', true)
                            ->paginate($perPage);

        return $products;
    }

    public function view($slug)
    {
        //get the product from the slug
        $product = Product::where('slug', '=', $slug)->first();
        $topProducts = ShopManager::topOrdered(3);
        $bestSellers = ShopManager::topOrdered(10)->pluck('product_id');

        //add the product views
        $product->addView();

        //prepare the product images
        $images = [];

        return view('site.product', compact('product', 'topProducts', 'bestSellers'));
    }

    //get the user cookie
    private function getCookie()
    {
        return Cookie::get(UserCookie::NAME);
    }

    public function checkOut()
    {
        $cookie = $this->getCookie();

        return view('site.checkout', compact('cookie'));
    }

}
