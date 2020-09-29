<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    // Route::get('/', function () { 
    //     return view('welcome');
    // });

    Route::group(['namespace' => 'Front'],function(){

        Route::get('/index', 'MainController@index')->name('index');

        Route::get('/signin', 'AuthController@signin')->name('signin-web');
        Route::post('/login-check-front', 'AuthController@login_check_front')->name('login-check-front');

        Route::get('contact', 'MainController@contact')->name('contact');
        Route::post('contact-save', 'MainController@contact_save')->name('contact-save');

        Route::get('/register-client', 'AuthController@register_client')->name('register-client');
        Route::get('/register-restaurant', 'AuthController@register_restaurant')->name('register-restaurant');
        Route::post('/register-client-save', 'AuthController@register_client_save')->name('register-client-save');
        Route::post('/register-restaurant-save', 'AuthController@register_restaurant_save')->name('register-restaurant-save');

        Route::get('/front-reset-password','AuthController@frontResetpassword')->name('front-reset-password');
        Route::post('/front-reset-password-check','AuthController@frontResetpasswordcheck')->name('front-reset-password-check');
        Route::post('/front-reset-password-save','AuthController@frontResetpasswordsave')->name('front-reset-password-save');

        Route::get('client-info/{id}', 'AuthController@client_info')->name('client-info');
        Route::post('client-info-change/{id}', 'AuthController@client_info_change')->name('client-info-change');
        Route::get('restaurant-info/{id}', 'AuthController@restaurant_info')->name('restaurant-info');
        Route::post('restaurant-info-change/{id}', 'AuthController@restaurant_info_change')->name('restaurant-info-change');

        Route::get('/logout-client','LogoutController@logout_client')->name('logout-client');
        Route::get('/logout-restaurant','LogoutController@logout_restaurant')->name('logout-restaurant');

        Route::get('/restaurant-products/{id}', 'MainController@restaurantProducts')->name('restaurant-products');
        Route::get('add-product', 'MainController@addProduct')->name('add-product');
        Route::post('add-product-save/{id}', 'MainController@addProductSave')->name('add-product-save');
        Route::get('all-products', 'MainController@allProducts')->name('all-products');
        Route::get('product-edit/{id}', 'MainController@productEdit')->name('product-edit');
        Route::post('product-edit-save/{id}', 'MainController@productEditSave')->name('product-edit-save');
        Route::get('product-delete/{id}', 'MainController@productDelete')->name('product-delete');

        Route::get('add-offer', 'MainController@addOffer')->name('add-offer');
        Route::post('add-offer-save/{id}', 'MainController@addOfferSave')->name('add-offer-save');
        Route::get('/restaurant-offers/{id}', 'MainController@restaurantOffers')->name('restaurant-offers');
        Route::get('all-offers', 'MainController@allOffers')->name('all-offers');
        Route::get('offer-edit/{id}', 'MainController@offerEdit')->name('offer-edit');
        Route::post('offer-edit-save/{id}', 'MainController@offerEditSave')->name('offer-edit-save');
        Route::get('offer-delete/{id}', 'MainController@offerDelete')->name('offer-delete');
        
        Route::get('restaurant-orders-pending/{id}', 'MainController@restaurantOrdersPending')->name('restaurant-orders-pending');
        Route::get('restaurant-orders-current/{id}', 'MainController@restaurantOrdersCurrent')->name('restaurant-orders-current');
        Route::get('restaurant-orders-previous-requests/{id}', 'MainController@restaurantOrdersPreviousRequests')->name('restaurant-orders-previous-requests');
		Route::get('restaurant-accepted-order/{id}', 'MainController@restaurantAcceptedOrder')->name('restaurant-accepted-order');
        Route::get('restaurant-rejected-order/{id}', 'MainController@restaurantRejectedOrder')->name('restaurant-rejected-order');
        Route::get('restaurant-confirm-order/{id}', 'MainController@restaurantConfirmOrder')->name('restaurant-confirm-order');

        Route::get('client-orders-current/{id}', 'MainController@clientOrdersCurrent')->name('client-orders-current');
        Route::get('client-orders-previous-requests/{id}', 'MainController@clientOrdersPreviousRequests')->name('client-orders-previous-requests');
        Route::get('client-declined-order/{id}', 'MainController@clientDeclinedOrder')->name('client-declined-order');
        Route::get('client-confirm-order/{id}', 'MainController@clientconfirmOrder')->name('client-confirm-order');

        Route::get('client-make-order/{id}', 'MainController@clientMakeOrder')->name('client-make-order');
        Route::post('client-new-order', 'MainController@clientNewOrder')->name('client-new-order');
        Route::get('client-add-cart', 'MainController@clientAddCart')->name('client-add-cart');
        Route::get('product-cart/{id}', 'MainController@productCart')->name('product-cart');
        Route::post('client-new-order-cart', 'MainController@clientNewOrderCart')->name('client-new-order-cart');
        Route::get('product-cart-delete/{id}', 'MainController@productCartDelete')->name('product-cart-delete');

    });


    Route::get('login','UsersController@login')->name('login');
    Route::post('login-check','UsersController@login_check')->name('login-check');

    Route::get('reset-password','UsersController@resetpassword')->name('reset-password');
    Route::post('reset-password-check','UsersController@resetpasswordcheck')->name('reset-password-check');
    Route::post('reset-password-save','UsersController@resetpasswordsave')->name('reset-password-save');

    Route::group(['middleware'=>['auth:web','auto-check-permission']], function(){

        Route::get('/home','HomeController@home')->name('home');

        Route::get('chang-password','UsersController@changpassword')->name('chang-password');
        Route::post('chang-password-save','UsersController@changpasswordsave')->name('chang-password-save');

        Route::resource('clients','ClientsController');
        Route::get('clients-activate/{id}','ClientsController@activate')->name('clients.activate');
        Route::get('clients-deactivate/{id}','ClientsController@deactivate')->name('clients.deactivate');

        Route::resource('restaurants','RestaurantsController');
        Route::get('restaurants-activate/{id}','RestaurantsController@activate')->name('restaurants.activate');
        Route::get('restaurants-deactivate/{id}','RestaurantsController@deactivate')->name('restaurants.deactivate');

        Route::resource('categories','CategoriesController');
        Route::delete('delete-category/{id}', 'CategoriesController@destroy')->name('delete-category');

        Route::resource('users','UsersController');
        Route::resource('role','RoleController');
        Route::resource('cities','citiesController');
        Route::resource('regions','RegionsController');
        Route::resource('offers','OffersController');
        Route::resource('orders','OrdersController');
        Route::resource('settings', 'SettingsController');
        Route::resource('contacts', 'ContactsController');
        Route::resource('payments', 'PaymentController');
        Route::get('logout','Auth\LogoutController@logout')->name('logout');
            
    });



