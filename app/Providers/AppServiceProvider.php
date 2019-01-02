<?php

namespace App\Providers;

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
        view()->composer('site.*', function($view){
            //pass the view with data
            $view->with('categories', \App\Admin\Category::all());
        });

        view()->composer(
            ['site.products', 'site.product_category', 'site.product_brand']
            , function($view){
            //pass the view with data
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
