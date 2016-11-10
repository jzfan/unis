<?php

use Illuminate\Http\Request;

//wechat

Route::any('/', 'WechatController@serve');
Route::group(['middleware'=>['web', 'wechat.oauth']], function () {
	Route::get('/index', 'IndexController@index');
	Route::get('/index2', 'IndexController@index2');
	Route::get('/about', 'IndexController@about');
	Route::get('/report', 'IndexController@report');
	Route::get('/order', 'OrderController@index');
	Route::get('/order/edit', 'OrderController@edit');
	Route::get('/cart', 'CartController@index');
	Route::post('/user', 'UserController@store');
	Route::get('/profile', 'UserController@show');
	Route::get('/address', 'UserController@address');
	Route::get('/favorite', 'UserController@favorite');
	Route::get('/message', 'UserController@message');
	Route::get('/balance', 'BillingController@balance');
	// Route::post('/checkout', 'Frontend\\CheckoutController@wechat');
	// Route::resource('/food', 'FoodController');
	// Route::get('/user', 'UserController@index');
	// Route::post('/user', 'UserController@store');
});
