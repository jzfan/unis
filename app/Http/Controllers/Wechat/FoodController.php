<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Suplier\Food;
class FoodController extends Controller
{
	public function index()
	{
		$foods = Food::simplePaginate();
    	return view('wechat.food.index', compact('foods'));
	}
}
