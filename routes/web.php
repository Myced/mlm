<?php

Route::get('/', function () {
    return view('welcome');
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
    // Route::get('/products')

    //brands controller
    Route::get('/getbrands/{$cat}', 'ApiBrandController@getCatBrands')->name('api.getCategoryBrands');
});
