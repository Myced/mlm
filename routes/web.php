<?php

Route::get('/', function () {
    return view('site.index');
});

//admin routes
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'AdminController@index')->name('dashboard');

    //category routes
    Route::group(['prefix' => 'category'], function(){
        Route::get('/', 'CategoryController@index')->name('categories');
        Route::get('/manage', 'CategoryController@manage')->name('categories.manage');
        Route::get('/create', 'CategoryController@create')->name('category.create');
        Route::post('/store', 'CategoryController@store')->name('category.store');
        Route::get('/{id}', 'CategoryController@view')->name('category.view');
    });

    //brand routes
    Route::group(['prefix' => 'brand'], function(){
        Route::get('/', 'BrandController@index')->name('brands');
        Route::get('/manage', 'BrandController@manage')->name('brands.manage');
        Route::post('/store', 'BrandController@store')->name('brand.store');
    });

    //manage products here
    Route::group(['prefix' => 'product'], function(){
        Route::get('/', 'ProductsController@index')->name('products');
        Route::get('/create', 'ProductsController@create')->name('product.create');
        Route::post('/store', 'ProductsController@store')->name('product.store');
        Route::get('/manage', 'ProductsController@manage')->name('products.manage');
    });
});

//register simple api routes
Route::group(['prefix' => 'api'], function(){

    //products apic
    Route::get('/', function(){
        return 'here we are';
    });

    //brands controller
    Route::get('/getbrands/{id}', 'ApiBrandController@getCatBrands');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//product view routes
Route::get('/products', 'ShoppingController@index')->name('products');
Route::get('/{$category}', 'ShoppingController@productsCategory')->name('products.category');
