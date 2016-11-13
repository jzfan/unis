<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\User\User;
use App\Unis\Suplier\Transformer\FoodTransformer;
use Dingo\Api\Routing\Helpers;
use App\Unis\Suplier\Food;
class FavoriteController extends Controller
{
	use Helpers;

    // public function index($user_id)
    // {
    // 	$favorites = User::find($user_id)->favorites;
    // 	return $this->response->collection($favorites, new FoodTransformer);
    // }
}
