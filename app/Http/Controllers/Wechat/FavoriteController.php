<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\User\User;
use App\Unis\User\Favorite;
use App\Unis\Suplier\Food;
use League\Fractal;
use League\Fractal\Manager as FractalManager;
use App\Unis\Suplier\Transformer\FoodTransformer;

class FavoriteController extends Controller
{

    public function index()
    {
    	return view('wechat.user.favorite');
    }

    public function getList(FractalManager $fractal)
    {
    	$favorites = User::find(getWechatUser()->id)->favorites;
		$resource = new Fractal\Resource\Collection($favorites, new FoodTransformer);
    	return $fractal->createData($resource)->toJson();

    }

    public function add($food_id)
    {
        if ($this->isExist($food_id)){
            return response()->json(['message' => 'added already', 'state' => 'error']);
        }
        if (Favorite::create([
            'user_id' => getWechatUser()->id,
            'food_id' => $food_id
        ])){

            return response()->json(['message' => 'add success', 'state' => 'success']);
        }
        return response()->json(['message' => 'add failed', 'state' => 'failed']);
    }

    public function cancel($food_id)
    {
    	if (! $this->isExist($food_id)){
    	    return response()->json(['message' => 'cancled already', 'state' => 'error']);
    	}
        if (Favorite::where(['user_id'=>getWechatUser()->id, 'food_id'=>$food_id])->delete()){
            return response()->json(['message' => 'cancle success', 'state' => 'success']);
        }
        return response()->json(['message' => 'cancle failed', 'state' => 'failed']);
    }

    protected function isExist($food_id)
    {
        return Favorite::where(['user_id'=>getWechatUser()->id, 'food_id'=>$food_id])->get()->count() > 0;
    }
}
