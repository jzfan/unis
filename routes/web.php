<?php

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', 'Frontend\IndexController@index');

//wechat
Route::group(['prefix' => 'wechat', 'middleware' => 'wechat.oauth:snsapi_userinfo'], function () {
	Route::any('/', 'Wechat\\WechatController@serve');
	// Route::get('/index', 'Frontend\\IndexController@wechat');
	Route::get('/order', 'Wechat\\OrderController@index');
	Route::post('/checkout', 'Frontend\\CheckoutController@wechat');
	Route::resource('/food', 'Wechat\\FoodController');
	Route::resource('/cart', 'Wechat\\CartController');
	Route::get('/users', 'Wechat\\UserController@index');
});

//admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'Backend\Admin'], function () {
	Route::get('/', 'AdminController@index');
	Route::resource('/member', 'MemberController');
	Route::resource('/agent', 'AgentController', ['except'=>['create', 'update', 'edit']]);
	Route::resource('/suplier', 'SuplierController');
	Route::resource('/school', 'SchoolController');
	Route::resource('/campus', 'CampusController');
	Route::resource('/shop', 'ShopController');
	Route::resource('/food', 'FoodController');
	Route::resource('/canteen', 'CanteenController');
	Route::resource('/dorm', 'DormController');
});

//test
Route::get('/region', 'Common\RegionController@index');
Route::get('/test', 'Common\RegionController@test');
