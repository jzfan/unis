<?php

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', 'Frontend\IndexController@index');

//wechat
Route::group(['prefix' => 'wechat', 'namespace'=>'Wechat', 'middleware' => 'wechat.oauth'], function () {
	Route::any('/', 'WechatController@serve');
	Route::get('/index', 'OrderController@index2');
	Route::get('/order', 'OrderController@index');
	Route::get('/my/order', 'OrderController@my');
	// Route::post('/checkout', 'Frontend\\CheckoutController@wechat');
	Route::resource('/food', 'FoodController');
	Route::resource('/cart', 'CartController');
	Route::get('/user', 'UserController@index');
	Route::post('/user', 'UserController@store');
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
	Route::resource('/room', 'RoomController');
});

//test
Route::get('/region', 'Common\RegionController@index');
Route::get('/test', 'Common\RegionController@test');
