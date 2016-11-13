<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Suplier\Food;
use App\Unis\Order\Cart;

class CartController extends BaseController
{

    public function index()
    {
        return view('wechat.cart.index');
    }

    public function show()
    {
		return view('wechat.cart.show');
	}

    public function store(Request $request)
    {
    	$food = Food::findOrFail($request->input('food_id'));
    	Cart::create([
    		'user_id' => \Auth::user()->id,
    		'food_id' => $food->id,
    		'amount'  => 1,
    		'price'  => $food->price
    		]);
    	return redirect()->back()->with('success', '已加入购物车！');
    }

    public function update()
    {

    }

    public function add($food_id)
    {
        Cart::create([
            'wechat_openid' => $this->user->id,
            'food_id' => $food_id
        ]);
        return 'ok';
    }
}
