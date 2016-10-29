<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Suplier\Food;

class CheckoutController extends Controller
{
    public function wechat(Request $request)
    {
    	$input = $request->input();
    	unset($input['_token']);
    	$total = $this->getTotal($input);
    	return view('wechat.pay', compact('total'));
    }

    protected function getTotal($arr)
    {
    	$total = 0;
    	foreach($arr as $food_id=>$food_num){
    		$price = Food::where('id', $food_id)->pluck('price')->first();
    		$total += $price * $food_num; 
    	}
    	return $total;
    }
}
