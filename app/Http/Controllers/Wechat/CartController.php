<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Suplier\Food;
use App\Unis\Order\Cart;
use App\Unis\User\User;
use League\Fractal;
use League\Fractal\Manager as FractalManager;
use App\Unis\Suplier\Transformer\FoodTransformer;

class CartController extends BaseController
{
    public function show()
    {
        $user = $this->getWechatUser();
		return view('wechat.cart.show', compact('user'));
	}

    public function store(Request $request)
    {
    	$food = Food::findOrFail($request->input('food_id'));
    	Cart::create([
    		'user_id' => $this->getWechatUser()->id,
    		'food_id' => $food->id,
    		]);
    	return redirect()->back()->with('success', '已加入购物车！');
    }

    public function update()
    {

    }

    public function add($food_id)
    {
        if ($this->isExist($food_id)){
            return response()->json(['message' => 'added already', 'state' => 'error']);
        }

        if (Cart::create([
            'user_id' => $this->getWechatUser()->id,
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

        if (Cart::where(['user_id'=>$this->getWechatUser()->id, 'food_id'=>$food_id])->delete()){
            return response()->json(['message' => 'cancle success', 'state' => 'success']);
        }
        return response()->json(['message' => 'cancle failed', 'state' => 'failed']);
    }

    protected function isExist($food_id)
    {
        return Cart::where(['user_id'=>$this->getWechatUser()->id, 'food_id'=>$food_id])->get()->count() > 0;
    }

    public function getList(FractalManager $fractal)
    {
        $cart_items = User::find($this->getWechatUser()->id)->foodsInCart;
        $resource = new Fractal\Resource\Collection($cart_items, new FoodTransformer);
        return $fractal->createData($resource)->toJson();
    }

    public function listByUser(Fractal $fractal)
    {
        $favorites = User::find($this->getWechatUser()->id)->favorites;
        $resource = new Fractal\Resource\Collection($favorites, new FoodTransformer);
        return $fractal->createData($resource)->toJson();

    }

}
