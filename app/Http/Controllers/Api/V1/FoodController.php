<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Suplier\Food;
use App\Unis\School\Canteen;
use Illuminate\Support\Facades\Input;
use App\Unis\Suplier\Transformer\FoodTransformer;
use Dingo\Api\Routing\Helpers;

class FoodController extends Controller
{
	use Helpers;

	protected $limit;
	protected $page;

	public function __construct(Request $request)
	{
		$this->limit = $request->limit ? : config('site.perPage');
        $this->page  = $request->page ? : 1;
	}

	public function index()
	{
    	Input::merge(["page" => $this->page]);
		$foods = Food::paginate($this->limit);
		return $this->response->paginator($foods, new FoodTransformer);    	
	}
    
    public function show($id)
    {
        return $this->response->item(Food::findOrFail($id), new FoodTransformer);
    }

    public function pageByCanteen($canteen_id)
    {
    	Input::merge(["page" => $this->page]);
    	$shops = Canteen::find($canteen_id)->shops->pluck('id')->toArray();
    	$foods = Food::whereIn('shop_id', $shops)->paginate($this->limit);
    	return $this->response->paginator($foods, new FoodTransformer);
    }

}
