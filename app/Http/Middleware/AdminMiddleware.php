<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        //if user is not authenticated, redirect to
        // admin login
        if(is_null(auth()->user()))
        {
            return redirect()->route('admin.login');
        }
        else {
            $user = auth()->user();

            //if the user is not an admin
            //redirect to 401
            if($user->level != \App\UserLevel::ADMIN)
                return redirect()->route('error.401');

        }

        return $next($request);
    }
}
