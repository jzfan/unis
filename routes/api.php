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
    $api->get('school', 'App\Http\Controllers\Api\V1\SchoolController@index');
    $api->get('school/dt', 'App\Http\Controllers\Api\V1\SchoolController@indexDt');
    $api->get('school/like/{keyword}', 'App\Http\Controllers\Api\V1\SchoolController@queryByKeyword');
	$api->get('suplier_select', 'App\Http\Controllers\Api\V1\SuplierController@indexForSelect');
	$api->get('suplier', 'App\Http\Controllers\Api\V1\SuplierController@index');
	$api->get('campus', 'App\Http\Controllers\Api\V1\CampusController@indexForSelect');
	$api->get('campuses_of_school/{school_id}', 'App\Http\Controllers\Api\V1\CampusController@queryBySchool');
    $api->get('canteens_of_campus/{campus_id}', 'App\Http\Controllers\Api\V1\CanteenController@listByCampus');
    $api->get('campus/query_by_dorm/{dorm_id}', 'App\Http\Controllers\Api\V1\DormController@getCampusBy');
	$api->get('dorms_of_campus/{campus_id}', 'App\Http\Controllers\Api\V1\DormController@listByCampus');
    $api->get('user/{id}', 'App\Http\Controllers\Api\V1\UserController@show');
    $api->get('users', 'App\Http\Controllers\Api\V1\UserController@index');

    $api->get('food/{id}', 'App\Http\Controllers\Api\V1\FoodController@show');
    $api->get('foods_of_canteen/{canteen_id}', 'App\Http\Controllers\Api\V1\FoodController@listByCanteen');
    $api->get('food', 'App\Http\Controllers\Api\V1\FoodController@index');
    // $api->get('favorite/{user_id}', 'App\Http\Controllers\Api\V1\FavoriteController@index');
    $api->delete('favorite/{food_id}', 'App\Http\Controllers\Api\V1\FavoriteController@delete');

    // $api->get('shop/dt', 'App\Http\Controllers\Api\V1\ShopController@dt');
    // $api->get('dt_server/{table}', 'App\Http\Controllers\Api\V1\DatatableController@ajax');


});