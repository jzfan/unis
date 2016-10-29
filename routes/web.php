<?php

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', 'Frontend\IndexController@index');

//wechat
Route::group(['prefix' => 'wechat'], function () {
	Route::get('/', 'Frontend\\IndexController@wechat');
	Route::post('/checkout', 'Frontend\\CheckoutController@wechat');
	Route::resource('/food', 'Wechat\\FoodController');
	Route::resource('/cart', 'Wechat\\CartController');
});

//admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'Backend'], function () {
	Route::get('/', 'AdminController@index');
	Route::resource('/member', 'MemberController');
	Route::resource('/agent', 'AgentController', ['except'=>['create', 'update', 'edit']]);
	Route::resource('/suplier', 'SuplierController');
	Route::resource('/school', 'SchoolController');
	Route::resource('/shop', 'ShopController');
	Route::resource('/food', 'FoodController');
	Route::resource('/canteen', 'CanteenController');
	Route::resource('/dorm', 'DormController');
});

//test
Route::get('/region', 'Common\RegionController@index');
Route::get('/test', 'Common\RegionController@test');