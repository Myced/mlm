<?php
namespace App\Http\Controllers;

use Cookie;
use Illuminate\Http\Request;
use App\Models\GeneologyDepth;
use App\Classes\CheckoutManager;

class CheckoutController extends Controller
{

    public function index()
    {
        $cookie = Cookie::get(\App\UserCookie::NAME);

        //check if the user is authenticated
        if(auth()->user())
        {
            //show options for authenticated
            return view('site.checkout_select');
        }
        else {
            //show options for
            return view('site.checkout_full', compact('cookie'));
        }
    }

    //unathenticated user registerting
    //full checkout
    public function createFull()
    {
        //authenticated user registering a new user
        $cookie = Cookie::get(\App\UserCookie::NAME);

        return view('site.checkout_full')->with('cookie', $cookie);
    }

    public function checkoutFull(Request $request)
    {

        $checkout = new CheckoutManager($request);

        //validate if neccessary;
        //setup before saving data
        $checkout->authenticate = true;
        $checkout->saveData = true;

        $checkout->saveData();

        session()->flash('success', 'Registration successful');

        return redirect()->route('checkout.confirmation');

    }

    //authenticated checkouts
    //the user is already logged in
    public function createRegister()
    {
        $myChildrenCount = auth()->user()->userData->getChildrenCount();
        $geneology = GeneologyDepth::find(1);

        if($myChildrenCount >= $geneology->width)
        {
            $full = true;
        }
        else {
            $full = false;
        }

        $ref_code = auth()->user()->userData->ref_code;
        $ref_name = auth()->user()->name;
        $cookie = Cookie::get(\App\UserCookie::NAME);

        return view('site.checkout_register', compact('ref_code', 'ref_name', 'cookie', 'full'));
    }

    //store the information
    public function registerNewUser(Request $request)
    {
        //register nw user
        $checkout = new CheckoutManager($request);

        //validate if neccessary;
        //setup before saving data
        $checkout->authenticate = false;
        $checkout->saveData = true;

        $checkout->saveData();

        session()->flash('success', 'User Registered. Congratulations');

        return redirect()->route('checkout.confirmation');
    }

    public function simple()
    {
        $cookie = Cookie::get(\App\UserCookie::NAME);

        return view('site.checkout_simple', compact('cookie'));
    }

    public function checkoutSimple(Request $request)
    {

        $checkout = new CheckoutManager($request);

        //validate if neccessary;
        //setup before saving data
        $checkout->authenticate = false;
        $checkout->saveData = false;

        $checkout->saveData();

        session()->flash('success', 'Your order has been placed');

        return redirect()->route('checkout.confirmation');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if(isset($request->remember))
        {
            $remember = true;
        }
        else {
            $remember = false;
        }


        //attemt the login
        $response = auth()->attempt([
            'email' => $email,
            'password' => $password
        ], $remember);


        if($response == false)
        {
            session()->flash('error', 'Username or password is incorrect');
        }

        return redirect()->route('checkout');
    }

    public function confirmation()
    {
        return view("site.checkout_confirmation");
    }
}
