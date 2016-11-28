<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Unis\Order\Order;
use App\Unis\Message\Feed;
use Carbon\Carbon;

class OrderController extends BaseController
{

  /**
  * @apiDefine OrderPageReturn
  * @apiSuccessExample 成功返回:
  * HTTP/1.1 200 OK
    {
      "total": 7,
      "per_page": 10,
      "current_page": 1,
      "last_page": 1,
      "next_page_url": null,
      "prev_page_url": null,
      "from": 1,
      "to": 7,
      "data": [
        {
          "id": 92,
          "order_no": "161121164414229",
          "billing_id": null,
          "type": "wxpay",
          "subject": "et食品|odit食品",
          "user_id": 229,
          "deliver_id": null,
          "total": 53,
          "school_id": 1,
          "campus_id": 8,
          "dorm_id": 62,
          "address": "南昌2大学cupiditate校区minus宿舍5",
          "mark": null,
          "status": "未付款",
            ......
          "order_items": [
            {
              "id": 277,
              "order_id": 92,
              "food_id": 1854,
              "amount": 3,
              "price": 16,
              "created_at": "2016-11-21 16:44:14",
              "updated_at": "2016-11-21 16:44:14",
              "food": {
                "id": 1854,
                "shop_id": 349,
                "name": "et食品",
                ......
                  }
                }
              }
            },
            ......
                }
              }
            }
          ],
          "orderer": {
            "id": 229,
            "name": "Dr. Wiley Rosenbaum II",
            ......
          }
        },
        ......
      ]
    }
  *
  */ 

    protected $limit;
    protected $page;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->limit = $request->limit ? : config('site.perPage');
        $this->page  = $request->page ? : 1;
    }
    /**
    * @api {get} /order 订单列表分页
    * @apiVersion 1.0.0
    * @apiName getOrderList
    * @apiGroup Order
    * @apiUse openidParam
    * @apiParam {Number} page 第几页
    * @apiParam {Number} limit 每页多少条
    * @apiUse OrderPageReturn
    */    
    public function getPage()
    {
      Input::merge(["page" => $this->page]);
    	$campus = $this->user->defaultAddress()->campus;
      return Order::where('campus_id', $campus->id)->with('order_items.food.shop.canteen', 'orderer')
                            ->where('status', 'ordered')->orderBy('created_at', 'asc')->paginate($this->limit);
    }

    /**
    * @api {get} /order/taken/{order_id}  接单
    * @apiVersion 1.0.0
    * @apiName OrderTaked
    * @apiGroup Order
    * @apiUse openidParam
    * @apiParam {Number} order_id 订单ID
    * @apiUse SuccessReturn 
    **/
    public function taken($order_id)
    {
      $todo = Order::where(['deliver_id'=>$this->user->id, 'status'=>'taken'])->count();
      if ($todo > 5){
          abort(403, 'Take Too Much');
      }
      \DB::transaction( function () use ($order_id) {
      	$order = Order::where(['id'=>$order_id, 'status'=>'paid'])->lockForUpdate()->first();
        $this->checkNull($order);
        $order->foods->map(function ($food){
            $food->sold += 1; 
            $food->save();
        });
        $order->update([
              'deliver_id' => $this->user->id,
              'status'     => 'taken',
              'taken_at'   => Carbon::now()
          ]);
        Feed::create([
          'order_id'    => $order->id,
          'sender_id'   => $this->user->id,
          'receiver_id' => $order->user_id,
          'status'      => 'send',
          'type'        => 'taken',
        ]);    
      });
    	return 'success';
    }

    /**
    * @api {get} /order/delivered/{order_id}  确认送达
    * @apiVersion 1.0.0
    * @apiName OrderDelivered
    * @apiGroup Order
    * @apiUse openidParam
    * @apiParam {Number} order_id 订单ID
    * @apiUse SuccessReturn  
    */ 
    public function delivered($order_id)
    {
    	$order = Order::where(['id'=>$order_id, 'status'=>'taken'])->first();
    	$this->checkNull($order);
    	$order->update([
    		'status'=>'delivered',
    		'delivered_at' => Carbon::now()
    	]);
    	return 'success';
    }

    /**
    * @api {get} /order/received/{order_id}  确认收到
    * @apiVersion 1.0.0
    * @apiName OrderReceived
    * @apiGroup Order
    * @apiUse openidParam
    * @apiParam {Number} order_id 订单ID
    * @apiUse SuccessReturn  
    */ 
    public function received($order_id)
    {
      \DB::transaction( function () use ($order_id){
          $order = Order::where(['id'=>$order_id, 'status'=>'delivered'])->lockForUpdate()->first();
          $this->checkNull($order);
          $order->status = 'received';
          $order->received_at = Carbon::now();
          $user = $order->deliver;
          $user->balance += $order->total; 

          $order->save();
          $user->save();
      });

    	return 'success';
    }

    private function checkNull($order)
    {
    	if (! $order){
    		abort(404, 'Order Not Found');
    	}
    }

    /**
    * @api {get} /order/show/{order_id}  取一条订单
    * @apiVersion 1.0.0
    * @apiName getOneOrder
    * @apiGroup Order
    * @apiUse openidParam
    * @apiParam {Number} order_id 订单ID
    * @apiSuccessExample 成功返回:
    *     HTTP/1.1 200 OK
        {
          "order": {
            "id": 2,
            "order_no": "161121164412922",
            "billing_id": null,
            "type": "wxpay",
            "subject": "et食品|maiores食品|explicabo食品|est食品",
            "user_id": 922,
            "deliver_id": null,
            "total": 69,
            "school_id": 2,
            "campus_id": 1,
            "dorm_id": 1,
            "address": "郑州3大学culpa校区sunt宿舍8",
            "mark": null,
            "status": "未付款",
            "appointment_at": null,
            "paid_at": null,
            "taken_at": null,
            "delivered_at": null,
            "received_at": null,
            "withdrawed_at": null,
            "created_at": "2016-11-21 16:44:12",
            "updated_at": "2016-11-21 16:44:12",
            "order_items": [
              {
                "id": 6,
                "order_id": 2,
                "food_id": 2077,
                "amount": 2,
                "price": 16,
                "created_at": "2016-11-21 16:44:12",
                "updated_at": "2016-11-21 16:44:12",
                "food": {
                  "id": 2077,
                  "shop_id": 50,
                  "name": "est食品",
                    ......
                }
              }
            ]
          }
        }
    *
    */ 
    public function getOne($order_id)
    {
        $order = Order::with('order_items.food', 'deliver', 'orderer')->where('id', $order_id)->first();
        $this->checkNull($order);
        return $order;
    }

    /**
    * @api {get} /order/untaken  未接订单分页
    * @apiVersion 1.0.0
    * @apiName getUntakenPage
    * @apiGroup Order
    * @apiUse openidParam
    * @apiParam {Number} order_id 订单ID
    * @apiUse OrderPageReturn
    *
    */ 
    public function unTakenSale()
    {
        Input::merge(["page" => $this->page]);
        $hoursAgo = Carbon::now()->subHours(3);
        return Order::where(['type'=>'wxpay', 'deliver_id'=>null, 'status'=>'paid'])->where('user_id', '<>', $this->user->id)->where('paid_at', '>', $hoursAgo)->with('order_items.food', 'orderer')->orderBy('id', 'ASC')->paginate($this->limit);      
    }

    /**
    * @api {get} /order/all_buy  我下的单分页
    * @apiVersion 1.0.0
    * @apiName getMyAllBuyPage
    * @apiGroup Order
    * @apiUse openidParam
    * @apiUse OrderPageReturn   
    *
    */
    public function allBuy()
    {
        Input::merge(["page" => $this->page]);
        return Order::where(['type'=>'wxpay', 'user_id'=>$this->user->id])->orderBy('id', 'DESC')->with('order_items.food', 'deliver')->paginate($this->limit);
    }


    /**
    * @api {get} /order/uncompleted_sale  我已接单未完成分页
    * @apiVersion 1.0.0
    * @apiName getMyUncompletedSalePage
    * @apiGroup Order
    * @apiUse openidParam
    * @apiSuccessExample 成功返回:
    * HTTP/1.1 200 OK
    [
      {
        "id": 2722,
        "order_no": "909161123154118",
        "billing_id": null,
        "type": "wxpay",
        "subject": "quia食品",
        "user_id": 909,
        "deliver_id": 1003,
        "total": 2100,
        "school_id": 2,
        "campus_id": 18,
        "dorm_id": 53,
        "address": "上海9大学velit校区odit宿舍8",
        "mark": null,
        "status": "配送中",
        "appointment_at": "1991-11-13 09:40:09",
        "paid_at": "1991-11-13 09:40:09",
        "taken_at": "2016-11-24 11:18:38",
        "delivered_at": null,
        "received_at": null,
        "refund_at": "2016-11-24 12:09:49",
        "withdrawed_at": null,
        "created_at": "2016-11-23 15:41:18",
        "updated_at": "2016-11-24 11:18:38",
        "deleted_at": null,
        "order_items": [
          {
            "id": 5447,
            "order_id": 2722,
            "food_id": 848,
            "amount": 1,
            "price": 2100,
            "created_at": "2016-11-23 15:41:18",
            "updated_at": "2016-11-23 15:41:18",
            "food": {
              "id": 848,
              "shop_id": 366,
              "name": "quia食品",
              "img": "http://lorempixel.com/50/50/?33480",
              "type": "",
              "description": "Repellat eius et nihil. Non ut voluptatem omnis possimus sequi voluptatum ratione in.",
              "price": "26.00",
              "discount": 20,
              "sold": 84,
              "favorite": 75,
              "recommend": 43,
              "status": "启用",
              "created_at": "2016-11-22 16:00:17",
              "updated_at": "2016-11-24 11:18:38"
            }
          }
        ],
        ......     
    ]
    */ 
    public function uncompletedSale()
    {
        return Order::where(['type'=>'wxpay', 'deliver_id'=>$this->user->id, 'status'=>'taken'])->orderBy('taken_at', 'DESC')->with('order_items.food', 'orderer')->get()->toArray();
    }

    /**
    * @api {get} /order/completed_sale  我已接单完成分页
    * @apiVersion 1.0.0
    * @apiName getMyCompletedSalePage
    * @apiGroup Order
    * @apiUse openidParam
    * @apiUse OrderPageReturn
    */ 
    public function completedSale()
    {
        Input::merge(["page" => $this->page]);
        return Order::where(['type'=>'wxpay', 'deliver_id'=>$this->user->id])->whereIn('status', ['received', 'delivered', 'withdrawed'])->orderBy('delivered_at', 'DESC')->with('order_items.food', 'orderer')->paginate($this->limit);
    }
}
