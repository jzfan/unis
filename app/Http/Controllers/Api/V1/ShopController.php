<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Suplier\Shop;

class ShopController extends Controller
{
    public function dt(Request $request)
    {
    	$shops = Shop::with('canteen.campus.school', 'suplier')->orderBy('id', 'desc')->get()->toArray();
    	return [
    				'draw' => (int)$request->draw,
    				'recordsTotal'=> Shop::all()->count(),
    				'recordsFiltered'=> Shop::all()->count(),
    				'data' => $shops
    			];
    }

    /**
    * @api {get} /food_of_shop/{shop_id}  取窗口食品
    * @apiVersion 1.0.0
    * @apiName getFoodsOfShop
    * @apiGroup Shop
    * @apiParam {Number} shop_id 窗口ID
    * @apiSuccessExample 成功返回:
    * HTTP/1.1 200 OK
    {
      "foods": [
        {
          "id": 7,
          "shop_id": 44,
          "name": "quia食品",
          "img": "http://lorempixel.com/50/50/?16469",
          "type": "",
          "description": "Dignissimos sit aut sint doloremque error. Dolorem molestias aliquam facilis enim ut esse et consequatur. Provident ex sequi iusto explicabo. Error consectetur veritatis tenetur est.",
          "price": "8.00",
          "discount": 40,
          "sold": 19,
          "favorite": 84,
          "recommend": 42,
          "status": "禁用",
          "created_at": "2016-11-21 16:44:04",
          "updated_at": "2016-11-21 16:44:04"
        },
        ......
      ]
    }
    */   
    public function getFoods($shop_id)
    {
        return Shop::findOrFail($shop_id)->foods;
    }

    /**
    * @api {get} shops_of_canteen/{canteen_id}  取食堂窗口列表
    * @apiVersion 1.0.0
    * @apiName listShopsOfCanteen
    * @apiGroup Shop
    * @apiParam {Number} canteen_id 食堂ID
    * @apiSuccessExample 成功返回:
    * HTTP/1.1 200 OK
    {
      "shops": [
        {
          "id": 18,
          "name": "omnis 小店",
          "canteen_id": 4,
          "suplier_id": 10,
          "created_at": "2016-11-21 16:44:04",
          "updated_at": "2016-11-21 16:44:04"
        },
        ......
      ]
    }
    */  
    public function listByCanteen($canteen_id)
    {
        return Shop::where('canteen_id', $canteen_id)->get();
    }
}
