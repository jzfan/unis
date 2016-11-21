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

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->get('user/delete', 'App\Http\Controllers\Api\V1\UserController@delete');
    $api->get('user/last', 'App\Http\Controllers\Api\V1\UserController@last');



    $api->get('school', 'App\Http\Controllers\Api\V1\SchoolController@index');
    $api->get('school/dt', 'App\Http\Controllers\Api\V1\SchoolController@indexDt');
    $api->get('school/like/{keyword}', 'App\Http\Controllers\Api\V1\SchoolController@queryByKeyword');
    $api->get('suplier_select', 'App\Http\Controllers\Api\V1\SuplierController@indexForSelect');
    $api->get('suplier', 'App\Http\Controllers\Api\V1\SuplierController@index');
    $api->get('campus', 'App\Http\Controllers\Api\V1\CampusController@indexForSelect');
    $api->get('campuses_of_school/{school_id}', 'App\Http\Controllers\Api\V1\CampusController@queryBySchool');
    $api->get('canteens_of_campus/{campus_id}', 'App\Http\Controllers\Api\V1\CanteenController@listByCampus');
    $api->get('shops_of_canteen/{canteen_id}', 'App\Http\Controllers\Api\V1\ShopController@listByCanteen');
    $api->get('campus/query_by_dorm/{dorm_id}', 'App\Http\Controllers\Api\V1\DormController@getCampusBy');
    $api->get('dorms_of_campus/{campus_id}', 'App\Http\Controllers\Api\V1\DormController@listByCampus');
    $api->get('user/{id}', 'App\Http\Controllers\Api\V1\UserController@show')->where(['id' => '[0-9]+']);
    // $api->post('user', 'App\Http\Controllers\Api\V1\UserController@store');
    $api->get('users', 'App\Http\Controllers\Api\V1\UserController@index');
    $api->get('order', 'App\Http\Controllers\Api\V1\OrderController@index');
    $api->post('order', 'App\Http\Controllers\Api\V1\OrderController@store');
    //取窗口食品列表
    $api->get('/food_of_shop/{shop_id}', 'App\Http\Controllers\Api\V1\ShopController@getFoods');

    $api->get('food/{id}', 'App\Http\Controllers\Api\V1\FoodController@show');
    $api->get('foods_of_canteen/{canteen_id}', 'App\Http\Controllers\Api\V1\FoodController@pageByCanteen');
    $api->get('food', 'App\Http\Controllers\Api\V1\FoodController@index');

//必须加参数在结尾  ?openid=xxxx
    //余额
    $api->get('user/balance', 'App\Http\Controllers\Api\V1\UserController@balance');
    $api->get('address/default', 'App\Http\Controllers\Api\V1\AddressController@getDefault');
    $api->get('address/me', 'App\Http\Controllers\Api\V1\AddressController@getDefaultArr');
    $api->get('address', 'App\Http\Controllers\Api\V1\AddressController@index');
    $api->put('address/{address_id}', 'App\Http\Controllers\Api\V1\AddressController@update');
    $api->post('address', 'App\Http\Controllers\Api\V1\AddressController@store');
    $api->delete('address/{address_id}', 'App\Http\Controllers\Api\V1\AddressController@destroy')->where(['address_id' => '[0-9]+']);
    //接单
    $api->get('order/taken/{order_id}', 'App\Http\Controllers\Api\V1\OrderController@taken');
    //确认送达
    $api->get('order/delivered/{order_id}', 'App\Http\Controllers\Api\V1\OrderController@delivered'); 
    //确认收到
    $api->get('order/received/{order_id}', 'App\Http\Controllers\Api\V1\OrderController@received');
    //订单详情
    $api->get('order/show/{order_id}', 'App\Http\Controllers\Api\V1\OrderController@show');

    //意见反馈
    $api->post('report', 'App\Http\Controllers\Api\V1\ReportController@store');
    //我的消息
    $api->get('feed', 'App\Http\Controllers\Api\V1\FeedController@index');

    // $api->get('favorite/{user_id}', 'App\Http\Controllers\Api\V1\FavoriteController@index');

    // $api->get('shop/dt', 'App\Http\Controllers\Api\V1\ShopController@dt');
    // $api->get('dt_server/{table}', 'App\Http\Controllers\Api\V1\DatatableController@ajax');


});