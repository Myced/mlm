<?php

namespace App\Http\Controllers;

use Cart;
use Cookie;
use Session;
use App\UserCookie;
use App\Admin\Product;
use App\Admin\Category;
use Illuminate\Http\Request;
use App\Classes\CookieManager;

class CartController extends Controller
{
    public function cart()
    {
        $this->validateCookie();
        return view('site.cart');
    }

    private function validateCookie()
    {
        $cookieManager = new CookieManager;
        $cookieManager->setCookie();
        return;
    }

    public function add(Request $request)
    {
        if($request->quantity == null || $request->quantity < 1)
        {
            Session::flash('error', 'Quantity must be greater than zero');

            return back();
        }
        else {
            $quantity = $request->quantity;

            $product = Product::where('code', '=', $request->product_id)->first();

            $price = $product->price;

            if($product->isOnPromotion())
            {
                $price = $product->getPrice();
            }

            //add the product to cart
            $cartItem = Cart::add($product->id, $product->name, $quantity, $price);

            $cartItem = $cartItem->associate('App\Admin\Product');

            //store the cart
            $cookie = Cookie::get(\App\UserCookie::NAME);
            Cart::store($cookie);

            Session::flash('success', 'Product added to Cart');

            return back();
        }

    }

    public function fastAdd($slug)
    {
        //get the product from the slug
        $product = Product::where('slug', '=', $slug)->first();

        $quantity = 1;

        $price = $product->price;

        if($product->isOnPromotion())
        {
            $price = $product->getPrice();
        }

        //add the product to cart
        $cartItem = Cart::add($product->id, $product->name, $quantity, $price);

        $cartItem = $cartItem->associate('App\Admin\Product');

        //store the cart
        $cookie = Cookie::get(\App\UserCookie::NAME);
        Cart::store($cookie);

        Session::flash('success', 'Product added to Cart');

        return back();
    }

    public function destroy()
    {
        Cart::destroy();

        //if the cart exist in the database then delete it
        $cookie = Cookie::get(\App\UserCookie::NAME);

        if(!is_null($cookie))
        {
            if(!empty($cookie))
            {
                Cart::deleteStoredCart($cookie);
            }
        }

        session()->flash('info', 'Your cart has been emptied');
        return back();
    }
}
