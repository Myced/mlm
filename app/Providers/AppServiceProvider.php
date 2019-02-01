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
            $view->with('categories', \App\Admin\Category::all());
        });

        view()->composer(
            ['site.products', 'site.product_categories', 'site.product_brands']
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
