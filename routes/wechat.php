<?php

use Illuminate\Http\Request;

//wechat

Route::any('/', 'WechatController@serve');
Route::group(['middleware'=>['web', 'wechat.oauth']], function () {
	Route::get('/register', 'UserController@register');
	Route::post('/user', 'UserController@store');
	Route::get('/index', 'IndexController@index');
	Route::group(['middleware' => 'register'], function(){
		Route::get('/cart', 'CartController@show');
		Route::put('/cart', 'CartController@update');
		Route::get('/about', 'IndexController@about');
		Route::get('/report', 'IndexController@report');
		Route::get('/order', 'OrderController@index');
		Route::get('/order/edit', 'OrderController@edit');
		Route::get('/user_info', 'UserController@getInfo');
		Route::get('/profile', 'UserController@show');
		Route::get('/address', 'UserController@address');
		Route::get('/favorite', 'FavoriteController@index');
		Route::get('/message', 'UserController@message');
		Route::get('/balance', 'BillingController@balance');

		Route::get('/ajax/favorite', 'FavoriteController@listByUser');
	});

	// Route::get('/order_received', function() {
	//     event(new App\Events\OrderReceived('Hi there Pusher!'));
	//     return "Event has been sent!";
	// });

	// Route::post('/checkout', 'Frontend\\CheckoutController@wechat');
	// Route::resource('/food', 'FoodController');
	// Route::get('/user', 'UserController@index');
	// Route::post('/user', 'UserController@store');
});
