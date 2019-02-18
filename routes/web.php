<?php

Route::get('/', function () {
    return view('site.index');
});

//admin routes
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('/orders', 'AdminController@orders')->name('orders');
    Route::get('/customer', 'AdminController@customer')->name('customer');
    Route::get('/order/detail', 'AdminController@orderDetail')->name('order.detail');

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
        Route::get('/', 'ProductsController@index')->name('admin.products');
        Route::get('/create', 'ProductsController@create')->name('product.create');
        Route::post('/store', 'ProductsController@store')->name('product.store');
        Route::get('/manage', 'ProductsController@manage')->name('products.manage');
    });
});

//user account routes
Route::group(['prefix' => "user"], function(){
    Route::get('/', 'UserPanelController@index')->name('user.dashboard');
});

//register simple api routes
Route::group(['prefix' => 'api'], function(){

    //products apic
    Route::get('/', function(){
        return 'Unauthorized Access';
    });

    Route::group(['prefix' => 'verify'], function(){
        Route::get('/', function(){
            return 'Unknow Action';
        });

        Route::post('/verifyref', 'VerifyController@verifyRef')->name('verify.ref');
    });

    //brands controller
    Route::get('/getbrands/{id}', 'ApiBrandController@getCatBrands');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/about-us', 'HomeController@about')->name('about-us');
Route::get('/blog', 'PostController@index')->name('blog');
Route::get('/post/{slug}', 'PostController@post')->name('blog.post');

//product view routes
Route::get('/cart', 'CartController@cart')->name('cart');
Route::post('/cart/add', 'CartController@add')->name('cart.add');
Route::get('/cart/destroy', 'CartController@destroy')->name('cart.destroy');
Route::get('/checkout', 'ShoppingController@checkOut')->name('checkout');
Route::post('/checkout/store', 'CheckoutController@checkout')->name('checkout.store');
Route::get('/products', 'ShoppingController@index')->name('products');
Route::get('/product/{slug}', 'ShoppingController@view')->name('product.detail');
Route::get('/category/{category}', 'ShoppingController@productsCategory')->name('products.category');
Route::get('/brand/{brand}', 'ShoppingController@productBrand')->name('products.brand');
