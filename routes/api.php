<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| 
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'api'], function(){

		Route::get('cities','MainController@cities');
		Route::get('regions','MainController@regions');
		Route::get('categories','MainController@categories');
		Route::get('products','MainController@products');
		Route::get('product-details', 'MainController@productsDetails' );
		Route::get('offers','MainController@offers');
		Route::get('offer-details', 'MainController@offerDetails' );  
		Route::get('payment-method', 'MainController@paymentMethod' );
		Route::get('settings', 'MainController@settings' );		
		Route::post('contact-us', 'MainController@contactUs' );
		Route::post('client-register','AuthController@client_register');
		Route::post('client-login','AuthController@client_login');
		Route::post('client-resetpassword','AuthController@client_restPassword');
		Route::post('client-chang-password','AuthController@clien_changpassword');
		Route::post('restaurant-register','AuthController@restaurant_register');
		Route::post('restaurant-login','AuthController@restaurant_login');
		Route::post('restaurant-reset-password','Authcontroller@restaurant_resetpassword');
		Route::post('restaurant-chang-password','AuthController@restaurant_changpassword');

	Route::group(['middleware'=>'auth:api,res-api'],function(){
		
		Route::get('comments','MainController@comments');

	});
 
	Route::group(['middleware'=>'auth:res-api'],function(){
		
//		Route::get('orders', 'MainController@orders');  
		Route::post('restaurant-register-token', 'AuthController@restaurantRegisterToken');
        Route::post('restaurant-remove-token', 'AuthController@restaurantRemoveToken');
		Route::post('product-create', 'MainController@product_create');
		Route::post('product-edit', 'MainController@productEdit');
		Route::post('product-delete', 'MainController@productDelete');
		Route::post('offers-create', 'MainController@offers_create');
		Route::post('offer-edit', 'MainController@offerEdit');
		Route::post('offer-delete', 'MainController@offerDelete'); 
		Route::get('rating-order', 'MainController@ratingOrder');
		Route::get('restaurant-accepted-order', 'MainController@restaurantAcceptedOrder');
		Route::get('restaurant-rejected-order', 'MainController@restaurantRejectedOrder');
		Route::get('restaurant-confirm-order', 'MainController@restaurantConfirmOrder');


	});

	Route::group(['middleware'=>'auth:api'],function(){

		Route::post('client-register-token', 'AuthController@clientRegisterToken');
		Route::post('client-remove-token', 'AuthController@clientRemoveToken');
		Route::post('new-order', 'MainController@newOrder');
		Route::get('order-details', 'MainController@orderDetails'); 
		Route::get('my-orders', 'MainController@myOrders');
        Route::get('client-confirm-order', 'MainController@clientconfirmOrder');
		Route::get('client-declined-order', 'MainController@clientDeclinedOrder');


	});

		
});

