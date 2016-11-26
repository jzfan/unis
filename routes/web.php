<?php

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', 'Frontend\IndexController@index');
Route::post('/upload/avatar', 'Backend\UploadController@avatar');

//admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'Backend\Admin'], function () {
	Route::get('/', 'AdminController@index');
	Route::resource('/member', 'MemberController');
	Route::resource('/agent', 'AgentController', ['except'=>['create']]);
	Route::resource('/suplier', 'SuplierController');
	Route::resource('/school', 'SchoolController');
	Route::resource('/campus', 'CampusController');
	Route::resource('/shop', 'ShopController');
	Route::resource('/food', 'FoodController');
	Route::resource('/canteen', 'CanteenController');
	Route::resource('/dorm', 'DormController');
	Route::resource('/room', 'RoomController');
	Route::resource('/order', 'OrderController');
	Route::post('/food/upload_img', 'FoodController@uploadImg');
});

//test
Route::get('/region', 'Common\RegionController@index');
Route::get('/test', 'Common\RegionController@test');

	Route::get('set/{id}', 'Frontend\IndexController@set');
	Route::get('get', 'Frontend\IndexController@get');
	Route::get('show', 'Frontend\IndexController@show');

