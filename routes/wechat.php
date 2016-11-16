<?php

use Illuminate\Http\Request;

//wechat

Route::any('/', 'WechatController@serve');
Route::group(['middleware'=>['web', 'wechat.oauth']], function () {

	Route::get('/register', 'UserController@register');
	Route::post('/user', 'UserController@store');
	Route::get('/user', 'UserController@info');
	Route::get('/wx_user', 'UserController@wxUserInfo');

	Route::group(['middleware' => 'register'], function(){
		Route::get('/index/{canteen_id?}', 'IndexController@index');
		Route::get('/cart', 'CartController@show');
		Route::get('/cart/add/{food_id}', 'CartController@add');
		Route::get('/cart/cancel/{food_id}', 'CartController@cancel');
		Route::get('/about', 'IndexController@about');
		Route::get('/report', 'IndexController@report');
		Route::get('/order/status', 'OrderController@status');
		Route::get('/order/index', 'OrderController@index');
		Route::get('/order/index2', 'OrderController@index2');
		Route::get('/order/index3', 'OrderController@index3');
		Route::get('/order/show/{order_id}', 'OrderController@show');
		Route::get('/order/{status?}', 'OrderController@getList');
		Route::get('/order/edit', 'OrderController@edit');
		Route::get('/user_info', 'UserController@getInfo');
		Route::get('/profile', 'UserController@show');
		Route::get('/address', 'UserController@address');
		Route::get('/favorite', 'FavoriteController@index');
		Route::get('/favorite/add/{food_id}', 'FavoriteController@add');
		Route::get('/favorite/cancel/{food_id}', 'FavoriteController@cancel');
		Route::get('/message', 'UserController@message');
		Route::get('/balance', 'BillingController@balance');
		Route::get('/pay', 'BillingController@payPage');

		Route::get('/paytest', 'BillingController@wechatPay');
		Route::get('/pay_notify', 'BillingController@wechatNotify');

		Route::get('/paid', 'BillingController@afterPaid');

		Route::get('/confirm_received', 'OrderController@confirmReceived');
		Route::get('/confirm_delivered', 'OrderController@confirmDelivered');
		Route::get('/post_report', 'IndexController@postReport');

		Route::get('/ajax/favorite', 'FavoriteController@getList');
		Route::get('/ajax/order', 'OrderController@orderedByUser');
		Route::get('/ajax/order/completed_buy', 'OrderController@completedBuy');
		Route::get('/ajax/order/completed_sale', 'OrderController@completedSale');
		Route::get('/ajax/order/uncompleted_buy', 'OrderController@uncompletedBuy');
		Route::get('/ajax/order/uncompleted_sale', 'OrderController@uncompletedSale');
		Route::get('/ajax/cart', 'CartController@getList');

		Route::get('/ajax/index_data', 'IndexController@data');



		Route::get('/test', 'CartController@test');
		Route::get('/demo', 'IndexController@demo');
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
