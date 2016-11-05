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
	$api->get('suplier', 'App\Http\Controllers\Api\V1\SuplierController@index');
	$api->get('campus/{limit}/{page}', 'App\Http\Controllers\Api\V1\CampusController@index');
	$api->get('campusOfSchool/{school_id}', 'App\Http\Controllers\Api\V1\CampusController@queryBySchool');
	$api->get('canteenOfCampus/{campus_id}', 'App\Http\Controllers\Api\V1\CanteenController@queryByCampus');
    $api->get('user/{id}', 'App\Http\Controllers\Api\V1\UserController@show');
    $api->get('users', 'App\Http\Controllers\Api\V1\UserController@index');
    $api->get('food/{id}', 'App\Http\Controllers\Api\V1\FoodController@show');
});