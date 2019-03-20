<?php

Route::get('/', 'HomeController@index')->name('index');

//admin login routes
//need to be out of the admin middleware to avoid
//an infinite redirect
Route::get('/login/admin', 'AdminAccountController@showLogin')->name('admin.login');
Route::post('/login/admin', 'AdminAccountController@login')->name('admin.login.store');

//admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/', 'AdminController@index')->name('dashboard');
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

    Route::group(['prefix' => 'order'], function(){
        Route::get('/', 'AdminOrderController@index')->name('orders');
        Route::get('/{code}', 'AdminOrderController@view')->name('order.details');
        Route::post('/{code}/log', 'AdminOrderController@log')->name('order.log');
    });

    Route::group(['prefix' => 'customer'], function(){
        Route::get('/', 'CustomerController@index')->name('customers');
        Route::get('/{user}', 'CustomerController@view')->name('customer');
    });

    Route::group(['prefix' => 'settings'], function(){
        Route::get('/company', 'SettingsController@index')->name('settings.company');
        Route::post('/company', 'SettingsController@saveCompany')->name('settings.company.store');

        Route::get('/geneology/depth', 'GeneologySettingsController@showDepth')->name('settings.geneology.depth');
        Route::post('/geneology/depth', 'GeneologySettingsController@saveDepth')->name('settings.geneology.depth.store');

        Route::get('/geneology/levels', 'GeneologySettingsController@levels')->name('settings.geneology.levels');
        Route::post('/geneology/levels', 'GeneologySettingsController@saveLevels')->name('settings.geneology.levels.store');

    });
});

//user account routes
Route::group(['prefix' => "user", 'middleware' => 'auth'], function(){
    Route::get('/', 'UserPanelController@index')->name('user.dashboard');
    Route::get('/orders', 'UserPanelController@orders')->name('user.orders');
    Route::get('/order/{code}', 'UserPanelController@orderDetail')->name('user.order.detail');
    Route::get('/order/{code}/payment', 'OrderController@payment')->name('order.payment');
    Route::get('/order/{code}/confirm', 'OrderController@confirm')->name('order.confirm');
    Route::get('/order/{code}/cancel', 'OrderController@cancel')->name('order.cancel');
    Route::get('/profile', 'UserPanelController@profile')->name("user.profile");
    Route::get('/profile/edit', 'UserPanelController@profileEdit')->name('profile.edit');
    Route::post('/profile/update', 'UserPanelController@profileUpdate')->name('profile.update');
    Route::get('/geneology/tree', 'UserGeneologyController@index')->name('user.geneology');
    Route::get('/geneology/tabular', 'UserGeneologyController@tabular')->name('user.geneology.tabular');
    Route::get('/geneology/statistics', 'UserGeneologyController@statistics')->name('user.geneology.statistics');
    Route::get('/password/change', 'UserAccountController@changePassword')->name('user.password.change');
    Route::post('/password/change/store', 'UserAccountController@updatePassword')->name('user.password.update');

    Route::get('/notifications', 'UserPanelController@notifications')->name('user.notifications');

    Route::get('/commissions', 'UserCommissionsController@index')->name('user.commissions');
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

        Route::get('/email/{email}', 'VerifyController@email');
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
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::post('/checkout/login', 'CheckoutController@login')->name('checkout.login');

//new unathenticated user
Route::get('/checkout/full', 'CheckoutController@createFull')->name('checkout.full.create');
Route::post('/checkout/full/store', 'CheckoutController@checkoutFull')->name('checkout.full.store');

//authenticated user, simple checkout
Route::get('/checkout/simple', 'CheckoutController@simple')->name('checkout.simple.create');
Route::post('/checkout/simple/store', 'CheckoutController@checkoutSimple')->name('checkout.simple.store');

//authenticated user // registering new user
Route::get('/checkout/register', 'CheckoutController@createRegister')->name('checkout.user.register');
Route::post('/checkout/register/store', 'CheckoutController@registerNewUser')->name('checkout.user.store');

Route::get('/checkout/confirmation', 'CheckoutController@confirmation')->name('checkout.confirmation');
Route::get('/products', 'ShoppingController@index')->name('products');
Route::get('/product/{slug}', 'ShoppingController@view')->name('product.detail');
Route::get('/category/{category}', 'ShoppingController@productsCategory')->name('products.category');
Route::get('/brand/{brand}', 'ShoppingController@productBrand')->name('products.brand');

Route::group(['prefix' => 'error'], function(){
    Route::get('/', 'ErrorsController@index')->name('error.index');
    Route::get('/401', 'ErrorsController@error401')->name('error.401');
});
