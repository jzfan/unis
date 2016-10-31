<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Suplier\Food;

class FoodController extends Controller
{
	public function index()
	{
		return Food::all()->take(5);
	}
    public function show($id)
    {
    	return Food::findOrFail($id);
    }
}
