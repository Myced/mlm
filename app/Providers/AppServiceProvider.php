<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        view()->composer('site.*', function($view){
            //pass the view with data

            $maxPrice = \App\Admin\Product::where('published', '=', true)->max('price');
            $minPrice = \App\Admin\Product::where('published', '=', true)->min('price');

            $view->with('categories', \App\Admin\Category::all());
            $view->with('brands', \App\Admin\Brand::all());
            $view->with('max_price', $maxPrice);
            $view->with('min_price', $minPrice);
            
        });

        view()->composer('auth.*', function($view){
            //pass the view with data
            $view->with('categories', \App\Admin\Category::all());
            $view->with('brands', \App\Admin\Brand::all());
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
