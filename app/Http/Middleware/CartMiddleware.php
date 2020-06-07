<?php

namespace App\Http\Middleware;

use Cart;
use Cookie;
use Closure;
use Session;
class CartMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response =  $next($request);

        //handle cart functions here.
        if(!Session::has('cart_restored'))
        {
            //get the persons cookie
            $cookie = Cookie::get(\App\UserCookie::NAME);

            //now restore the cart instance from the database
            Cart::restore($cookie);

            Session::put('cart_restored', true);
        }

        return $response;
    }
}
