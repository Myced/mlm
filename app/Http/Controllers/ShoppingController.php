<?php

namespace App\Http\Controllers;

use DB;
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
    private $perPage = 18;

    public function index()
    {
        //validate user cookie
        $this->validateCookie();

        //check that the per page has been changed
        if(!is_null(request()->per_page))
        {
            $this->perPage = request()->per_page;
        }
        // composer require hardevine/shoppingcart
        $products = $this->getProducts($this->perPage);
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

        $products = Product::where('category_id', '=', $category->id)
                            ->where('published', '=', true)
                            ->paginate($this->perPage);
        $topProducts = ShopManager::topOrdered()->pluck('product_id');
        $cat = $category;

        return view('site.product_categories', compact('products', 'category', 'topProducts', 'cat'));
    }

    public function productsBrand($brandSlug)
    {
        $brand = Brand::where('slug', '=', $brandSlug)->first();

        $products = Product::where('brand_id', '=', $brandSlug)
                            ->where('published', '=', true)
                            ->paginate();

        $topProducts = ShopManager::topOrdered()->pluck('product_id');
        $b = $brand;

        return view('site.product_brands', compact('products', 'b', 'topProducts'));
    }

    public function getProducts($perPage = 18)
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

    public function searchProducts()
    {
        $keyword = request()->keyword;
        $category = request()->category;

        if(empty($keyword))
        {
            session()->flash('error', 'Search keyword cannot be empty');
            return back();
        }

        $keyword = '%' . $keyword . '%';

        //search for the product
        $search = Product::where('name', 'LIKE', $keyword);  //the search query builder
        $search->where('published', '=', true);

        if(empty($category) || is_null($category) || $category == -1)
        {
            $products = $search->get();
        }
        else {
            $search->where('category_id', '=', $category);
            $products = $search->get();
        }

        $bestSellers = ShopManager::topOrdered(10)->pluck('product_id');

        return view('site.products_search', compact('products', 'bestSellers'));
    }

    public function filter()
    {
        $brands = request()->brands;
        $categories = request()->categories;
        $minPrice = request()->min_price;
        $maxPrice = request()->max_price;


        //now make sure the category and brands are actual arrays
        if(is_null($brands))
        {
            $brands = [];
        }

        if(is_null($categories))
        {
            $categories = [];
        }

        $builder = Product::where('published', '=', true);
        $builder->where('price', '>=', $minPrice);
        $builder->where('price', '<=', $maxPrice);

        // $rawSql = "select * from "
        //             . "(select * from `products` where `price` >= ? "
        //             . "and `price` <= ? and `published` = 1) as `products`";
        //
        // $subSelect = Product::where('price', '>=', $minPrice)
        //                         ->where('price', '<=', $maxPrice)
        //                         ->where('published', '=', true)
        //                         ->toSql();
        //
        // $builder = Product::fromQuery($subSelect, [$minPrice, $maxPrice, true]);

        //build for categories now
        for($i = 0; $i < count($categories); $i++)
        {
            if($i == 0)
                $builder->where('category_id', '=', $categories[$i]);

            $builder->orWhere('category_id', '=', $categories[$i]);
        }

        for($i = 0; $i < count($brands); $i++)
        {
            $builder->orWhere('brand_id', '=', $brands[$i]);
        }

        // dd($builder->toSql());

        $products = $builder->paginate($this->perPage);
        $topProducts = ShopManager::topOrdered()->pluck('product_id');

        return view('site.products_filtered', compact('products', 'topProducts'));

    }

}
