<?php

namespace App\Http\Middleware;

use Crypt;
use Cookie;
use Closure;

class LocaleMiddleware
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
        $cookie = "locale";

        //lets set an array of valid locales
        $locales = ['fr', 'en'];

        $default = 'fr';

        $current = Cookie::get($cookie);

        //decription middleware has not kicked in yet.
        //so we need to manually decrypt the cookie
        $currentValue = Crypt::decrypt($current, false);

        if(!is_null($currentValue) && !empty($currentValue))
        {
            //set the locale to this cookie
            if(in_array($currentValue, $locales))
            {
                app()->setLocale($currentValue);
            }
            else {
                app()->setLocale($default);
            }
        }
        else {
            app()->setLocale($default);

            //set the cookie too
            Cookie::queue($cookie, $default, 2628000);
        }



        return $next($request);
    }
}
