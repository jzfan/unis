<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\User\User;
use App\Unis\Suplier\Food;
use League\Fractal;
use League\Fractal\Manager;
use App\Unis\Suplier\Transformer\FoodTransformer;

class FavoriteController extends BaseController
{

    public function index()
    {
    	return view('wechat.user.favorite');
    }

    public function listByUser()
    {
    	$favorites = User::where('wechat_openid', $this->user->id)->first()->favorites;
		$resource = new Fractal\Resource\Collection($favorites, new FoodTransformer);
		$fractal = new Manager();
    	return $fractal->createData($resource)->toJson();

    }
}
