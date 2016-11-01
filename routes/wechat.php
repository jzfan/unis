<?php

use Illuminate\Http\Request;

//wechat

Route::any('/', 'Wechat\\WechatController@serve');
Route::get('/index', 'Frontend\\IndexController@wechat');
Route::post('/checkout', 'Frontend\\CheckoutController@wechat');
Route::resource('/food', 'Wechat\\FoodController');
Route::resource('/cart', 'Wechat\\CartController');
