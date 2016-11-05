<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Suplier\Food;
use App\Unis\Order\Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('wechat.cart.index');
    }

    public function show($user_id)
    {
        $this->authorize('cart-action', $user_id);
        $items = Cart::with('food')->where('user_id', $user_id)->get();
        $foods = $items->map(function ($item) {
            return $item->food;
        });
		return view('wechat.cart.show', compact('foods'));
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
}
