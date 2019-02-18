<?php
namespace App\Http\Controllers;

use App\Models\UserData;
use Illuminate\Http\Request;
use App\Classes\CheckoutManager;

class CheckoutController extends Controller
{

    public function checkout(Request $request)
    {
        $checkout = new CheckoutManager($request);

        //validate if neccessary;

        $checkout->saveData();

        return view("site.checkout_confirmation");

    }


}
