<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Suplier\Food;
use Illuminate\Support\Facades\Input;
use App\Unis\Suplier\Transformer\FoodTransformer;
use Dingo\Api\Routing\Helpers;

class FoodController extends Controller
{
	use Helpers;

	public function index(Request $request)
	{
		$limit = $request->limit ? : config('site.perPage');
        $page  = $request->page ? : 1;
    	Input::merge(["page" => $page]);
		$foods = Food::paginate($limit);
		return $this->response->paginator($foods, new FoodTransformer);    	
	}
    public function show($id)
    {
    	return Food::findOrFail($id);
    }

    public function test()
    {
    	Input::merge(["page" => 2]);
    	$foods = Food::paginate(5);
    	// return $foods;
    	return $this->response->paginator($foods, new FoodTransformer);
    	// return collect();
    	return collect($foods, new FoodTransformer, [], function ($resource, $fractal) {
    		$resource->setCursor(2);
		});
    }
}
