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

    /**
    * @api {get} /food 食品分页列表
    * @apiVersion 1.0.0
    * @apiName getFoodList
    * @apiGroup Food
    * @apiParam {String} openid 微信用户openid
    * @apiParam {Number} page 第几页
    * @apiParam {Number} limit 每页多少条
    * @apiSuccessExample 成功返回:
    *     HTTP/1.1 200 OK
    {
      "data": [
        {
          "id": 3,
          "name": "expedita食品",
          "price": 9.5,
          "original_price": "13.5",
          "img": "http://lorempixel.com/50/50/?44005",
          "sold": 2
        }
      ],
      "meta": {
        "pagination": {
          "total": 3360,
          "count": 1,
          "per_page": 1,
          "current_page": 3,
          "total_pages": 3360,
          "links": {
            "previous": "http://unis.com/api/food?page=2",
            "next": "http://unis.com/api/food?page=4"
          }
        }
      }
    }
    *
    */
	public function getList()
	{
    Input::merge(["page" => $this->page]);
		$foods = Food::paginate($this->limit);
		return $this->response->paginator($foods, new FoodTransformer);    	
	}

    /**
    * @api {get} /food/{food_id} 取一条食品
    * @apiVersion 1.0.0
    * @apiName getOneFood
    * @apiGroup Food
    * @apiParam {String} openid 微信用户openid
    * @apiSuccessExample 成功返回:
    *     HTTP/1.1 200 OK
        {
          "data": {
            "id": 77,
            "name": "牛肉拉面",
            "price": 11,
            "original_price": "12.0",
            "img": "/uploads/food/14793132235u.jpg",
            "sold": 0
          }
        }
    *
    */    
    public function getOne($id)
    {
        return $this->response->item(Food::with('shop.canteen')->findOrFail($id), new FoodTransformer);
    }

    /**
    * @api {get} /foods_of_canteen/{canteen_id}  食堂食品分页
    * @apiVersion 1.0.0
    * @apiName foodsPageByCanteen
    * @apiGroup Food
    * @apiParam {String} openid 微信用户openid
    * @apiSuccessExample 成功返回:
    *     HTTP/1.1 200 OK
        {
          "data": [
            {
              "id": 178,
              "name": "糯米栗子粥",
              "price": 7.5,
              "original_price": "8.0",
              "img": "/uploads/food/1479312890ZC.jpg",
              "sold": 0
            },
            ......
          ],
          "meta": {
            "pagination": {
              "total": 31,
              "count": 10,
              "per_page": 10,
              "current_page": 1,
              "total_pages": 4,
              "links": {
                "next": "http://un-sv.com/api/foods_of_canteen/2?page=2"
              }
            }
          }
        }
    *
    */  
    public function pageByCanteen($canteen_id)
    {
    	Input::merge(["page" => $this->page]);
    	$shops = Canteen::find($canteen_id)->shops->pluck('id')->toArray();
    	$foods = Food::whereIn('shop_id', $shops)->paginate($this->limit);
    	return $this->response->paginator($foods, new FoodTransformer);
    }

    /**
    * @api {post} /food/ids  根据多个ID取食品列表
    * @apiVersion 1.0.0
    * @apiName postIdsToGetFoods
    * @apiGroup Food
    * @apiParam {String} openid 微信用户openid
    * @apiParam {String} ids 多个食品id以逗号链接
    * @apiSuccessExample 成功返回:
    * HTTP/1.1 200 OK
      {
        "data": [
          {
            "id": 11,
            "name": "nostrum食品",
            "price": "13.0",
            "original_price": "26.0",
            "img": "http://lorempixel.com/50/50/?94472",
            "sold": 151,
            "canteen": "dicta食堂"
          },
      }
    *
    */  
    public function getByIds(Request $request)
    {
      $ids = explode(',', $request->ids);
      $foods = Food::whereIn('id', $ids)->get();
      return $this->response->collection($foods, new FoodTransformer);
    }

}
