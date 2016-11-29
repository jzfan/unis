<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Suplier\Shop;

class ShopController extends Controller
{

    /**
    * @api {get} /food_of_shop/{shop_id}  取窗口食品
    * @apiVersion 1.0.0
    * @apiName getFoodsOfShop
    * @apiGroup Shop
    * @apiParam {Number} shop_id 窗口ID
    * @apiSuccessExample 成功返回:
    * HTTP/1.1 200 OK
    [
      {
        "id": 896,
        "name": "consequuntur食品",
        "img": "http://lorempixel.com/50/50/?26143",
        "price": 900,
        "original_price": "17.50",
        "sold": 10
        "canteen": xx食堂
      },
      ......
    ]
    */   
    public function getFoods($shop_id)
    {
        $shop    = Shop::findOrFail($shop_id);
        $foods   = $shop->foods;
        $canteen = $shop->canteen->name;
        $data = [];
        foreach ($foods as $food){
           $data[] = [
              'id'             => $food->id,
              'name'           => $food->name,
              'img'            => $food->img,
              'price'          => $food->sale_price,
              'original_price' => $food->price,
              'sold'           => $food->sold,
              'canteen'        => $canteen
            ];          
        }
        return $data;
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
