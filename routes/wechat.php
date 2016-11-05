<?php

use Illuminate\Http\Request;

//wechat

Route::any('/', 'WechatController@serve');
Route::group(['middleware'=>['web']], function () {
	Route::get('/index', 'OrderController@index2');
	Route::get('/order', 'OrderController@index');
	Route::get('/my/order', 'OrderController@my');
	// Route::post('/checkout', 'Frontend\\CheckoutController@wechat');
	Route::resource('/food', 'FoodController');
	Route::resource('/cart', 'CartController');
	Route::get('/user', 'UserController@index');
	Route::post('/user', 'UserController@store');
});
