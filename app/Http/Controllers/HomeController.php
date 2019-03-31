<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\ShopManager;
use App\Classes\CookieManager;
use App\Models\FeaturedProduct;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->validateCookie();

        $topOrdered = ShopManager::topOrdered();

        //get the main featured product
        $mainProduct = FeaturedProduct::where('is_main', '=', true)->first();
        $featuredProducts = FeaturedProduct::where('is_main', '=', false)->get();

        return view('site.index', compact('topOrdered', 'mainProduct', 'featuredProducts'));
    }

    private function validateCookie()
    {
        $cookieManager = new CookieManager;
        $cookieManager->setCookie();
        return;
    }

    public function contact()
    {
        return view('site.contact');
    }

    public function about()
    {
        return view('site.about_us');
    }
}
