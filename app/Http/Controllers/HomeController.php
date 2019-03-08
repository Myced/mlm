<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\CookieManager;

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

        return view('site.index');
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
