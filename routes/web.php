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

    //category routes
    Route::group(['prefix' => 'category'], function(){
        Route::get('/', 'CategoryController@index')->name('categories');
        Route::get('/manage', 'CategoryController@manage')->name('categories.manage');
        Route::get('/create', 'CategoryController@create')->name('category.create');
        Route::post('/store', 'CategoryController@store')->name('category.store');
        Route::get('/{id}', 'CategoryController@view')->name('category.view');
        Route::get('/{id}/edit', 'CategoryController@edit')->name('category.edit');
        Route::post('/{id}/update', 'CategoryController@update')->name('category.update');
        Route::get('/{id}/destroy', 'CategoryController@destroy')->name('category.destroy');
    });

    //brand routes
    Route::group(['prefix' => 'brand'], function(){
        Route::get('/', 'BrandController@index')->name('brands');
        Route::get('/manage', 'BrandController@manage')->name('brands.manage');
        Route::post('/store', 'BrandController@store')->name('brand.store');
        Route::get('/{id}', 'BrandController@view')->name('brand.view');
        Route::get('/{id}/edit', 'BrandController@edit')->name('brand.edit');
        Route::post('/{id}/update', 'BrandController@update')->name('brand.update');
        Route::get('/{id}/destroy', 'BrandController@destroy')->name('brand.destroy');
    });

    //manage products here
    Route::group(['prefix' => 'product'], function(){
        Route::get('/', 'ProductsController@index')->name('admin.products');
        Route::get('/create', 'ProductsController@create')->name('product.create');
        Route::post('/store', 'ProductsController@store')->name('product.store');
        Route::get('/featured', 'ProductsController@featured')->name('products.featured');
        Route::post('/featured/add', 'ProductsController@addFeatured')->name('products.featured.add');
        Route::get('/featured/{id}/destroy', 'ProductsController@destroyFeatured');
        Route::get('/featured/{id}/main', 'ProductsController@mainFeatured')->name('products.featured.main');
        Route::get('/promoted', 'ProductsController@promoted')->name('products.promoted');
        Route::post('/promoted/add', 'ProductsController@addPromotion')->name('products.promoted.add');
        Route::get('/promoted/{id}/destroy', 'ProductsController@removePromotion')->name('product.promoted.remove');
        Route::get('/{id}', 'ProductsController@view')->name('admin.product.detail');
        Route::get('/{id}/edit', 'ProductsController@edit')->name('product.edit');
        Route::post('/{id}/update', 'ProductsController@update')->name('product.update');
        Route::get('/{id}/destroy', 'ProductsController@destroy')->name('product.delete');
        Route::post('/{id}/upload/image', 'ProductsController@uploadImage')->name('product.image.upload');
        Route::get('/{id}/image/{image}/destroy', 'ProductsController@deleteImage');
        Route::get('/{id}/movements', 'ProductsController@movements')->name('product.movements');
    });

    Route::group(['prefix' => 'order'], function(){
        Route::get('/', 'AdminOrderController@index')->name('orders');
        Route::get('/{code}', 'AdminOrderController@view')->name('order.details');
        Route::post('/{code}/log', 'AdminOrderController@log')->name('order.log');
        Route::get('/{code}/status/{status}/update', 'AdminOrderController@updateStatus')->name('order.status.update');
        Route::get('/period/today', 'AdminOrderController@today')->name('orders.today');
        Route::get('/period/yesterday', 'AdminOrderController@yesterday')->name('orders.yesterday');
        Route::get('/period/this-week', 'AdminOrderController@thisWeek')->name('orders.thisweek');
        Route::get('/period/this-month', 'AdminOrderController@thisMonth')->name('orders.thismonth');
        Route::get('/period/filter', 'AdminOrderController@filter')->name('orders.filter.period');
    });

    Route::group(['prefix' => 'payout'], function(){
        Route::get('/orange', 'PayoutController@orange')->name('payout.orange');
        Route::get('/mtn', 'PayoutController@mtn')->name('payout.mtn');
        Route::get('/failed', 'PayoutController@failed')->name('payout.failed');
        Route::get('/refresh', 'PayoutController@refresh')->name('payout.refresh');
    });

    Route::group(['prefix' => 'customer'], function(){
        Route::get('/', 'CustomerController@index')->name('customers');
        Route::get('/{user}', 'CustomerController@view')->name('customer');
        Route::get('/{user}/tree', 'CustomerController@tree')->name('customer.tree');
        Route::get('/{user}/table', 'CustomerController@table')->name('customer.table');
        Route::get('/{user}/commissions', 'CustomerController@commissions')->name('customer.commissions');
    });

    Route::group(['prefix' => 'distributor'], function(){
        Route::get('/', 'DistributorController@index')->name('distributors');
        Route::get('/create', 'DistributorController@create')->name('distributor.create');
        Route::post('/store', 'DistributorController@store')->name('distributor.store');
        Route::get('/{id}', 'DistributorController@view')->name('distributor');
        Route::get('/{id}/edit', 'DistributorController@edit')->name('distributor.edit');
        Route::post('/{id}/update', 'DistributorController@update')->name('distributor.update');
        Route::get('/{id}/destroy', 'DistributorController@destroy')->name('distributor.destroy');
    });

    Route::group(['prefix' => 'settings'], function(){
        Route::get('/company', 'SettingsController@index')->name('settings.company');
        Route::post('/company', 'SettingsController@saveCompany')->name('settings.company.store');

        Route::get('/geneology/depth', 'GeneologySettingsController@showDepth')->name('settings.geneology.depth');
        Route::post('/geneology/depth', 'GeneologySettingsController@saveDepth')->name('settings.geneology.depth.store');

        Route::get('/geneology/levels', 'GeneologySettingsController@levels')->name('settings.geneology.levels');
        Route::post('/geneology/levels', 'GeneologySettingsController@saveLevels')->name('settings.geneology.levels.store');

        Route::get('/geneology/membership', 'GeneologySettingsController@showMembershipLevelForm')->name('settings.membership.levels');
        Route::post('/geneology/membership', 'GeneologySettingsController@saveMembershipLevels')->name('settings.membership.store');

        Route::get('/payout', 'PayoutSettingController@index')->name('settings.payout');
        Route::post('/payout/store', 'PayoutSettingController@store')->name('settings.payout.store');
    });
});

//user account routes
Route::group(['prefix' => "user", 'middleware' => 'auth'], function(){
    Route::get('/', 'UserPanelController@index')->name('user.dashboard');
    Route::get('/orders', 'UserPanelController@orders')->name('user.orders');
    Route::get('/order/{code}', 'UserPanelController@orderDetail')->name('user.order.detail');
    Route::get('/order/{code}/payment', 'OrderController@payment')->name('order.payment');
    Route::get('/order/{code}/payment/momo', 'OrderController@momoPayment')->name(\App\PaymentMethods::MTN_MOMO);
    Route::get('/order/{code}/payment/orange', 'OrderController@orangePayment')->name(\App\PaymentMethods::ORANGE_MONEY);
    Route::get('/order/{code}/payment/visa', 'OrderController@visaPayment')->name(\App\PaymentMethods::VISA);
    Route::get('/order/{code}/payment/cash', 'OrderController@cashPayment')->name(\App\PaymentMethods::CASH_ON_DELIVERY);
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

    Route::post('/payment/momo', 'PaymentController@momo')->name('payment.momo');
    Route::post('/payment/orange', 'PaymentController@orange')->name('payment.orange');

    Route::post('/payout/mtn', 'PaymentController@payoutMomo');
    Route::post('/payout/orange', 'PaymentController@payoutOrange');

    //brands controller
    Route::get('/getbrands/{id}', 'ApiBrandController@getCatBrands');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/about-us', 'HomeController@about')->name('about-us');
Route::get('/blog', 'PostController@index')->name('blog');
Route::get('/post/{slug}', 'PostController@post')->name('blog.post');

Route::get('/locale/en', 'LocaleController@en')->name('locale.en');
Route::get('/locale/fr', 'LocaleController@fr')->name('locale.fr');

//product view routes
Route::get('/cart', 'CartController@cart')->name('cart');
Route::post('/cart/add', 'CartController@add')->name('cart.add');
Route::get('/cart/destroy', 'CartController@destroy')->name('cart.destroy');
Route::get('/cart/remove/{id}', 'CartController@remove')->name('cart.remove');
Route::post('/cart/update', 'CartController@update')->name('cart.update');
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
Route::get('/products/search', 'ShoppingController@searchProducts')->name('products.search');
Route::get('/product/{slug}', 'ShoppingController@view')->name('product.detail');
Route::get('/product/{slug}/cart', 'CartController@fastAdd')->name('cart.fast');
Route::get('/category/{category}', 'ShoppingController@productsCategory')->name('products.category');
Route::get('/brand/{brand}', 'ShoppingController@productsBrand')->name('products.brand');

Route::group(['prefix' => 'error'], function(){
    Route::get('/', 'ErrorsController@index')->name('error.index');
    Route::get('/401', 'ErrorsController@error401')->name('error.401');
});
