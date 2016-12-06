<?php

namespace App\Http\Controllers\Api\V1;

use Carbon\Carbon;
use League\Fractal;
use App\Http\Requests;
use App\Unis\Order\Order;
use App\Unis\Message\Feed;
use League\Fractal\Manager;
use App\Unis\School\Canteen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Unis\Order\Transformer\OrderTransformer;

class OrderController extends BaseController
{

  /**
  * @apiDefine OrderPageReturn
  * @apiSuccessExample 成功返回:
  * HTTP/1.1 200 OK
    {
      "data": [
        {
          "id": 3031,
          "order_no": "1003161126192356",
          "orderer": {
            "name": "LMercury小敏",
            "phone": "18622525566"
          },
          "deliver": null,
          "address": "上海9大学dicta校区aspernatur宿舍22",
          "total": "上海9大学dicta校区aspernatur宿舍22",
          "apponitment_at": "2016/11/26 - 19:53",
          "status": "未付款",
          "foods": {
            "data": [
              {
                "id": 141,
                "name": "est食品",
                "price": "14.0",
                "quntity": null,
                "original_price": "20.0",
                "img": "http://lorempixel.com/50/50/?52894",
                "sold": 79,
                "canteen": "ad食堂"
              }
            ]
          }
        },
        ......
      ],
      "meta": {
        "pagination": {
          "total": 18,
          "count": 2,
          "per_page": 8,
          "current_page": 3,
          "total_pages": 3,
          "links": {
            "previous": "http://unis.com/api/order?page=2"
          }
        }
      }
    }
  *
  */ 

    protected $limit;
    protected $page;
    protected $fractal;

    public function __construct(Request $request, Manager $fractal)
    {
        parent::__construct($request);
        $this->limit = $request->limit ? : config('site.perPage');
        $this->page  = $request->page ? : 1;
        $this->fractal = $fractal;
        Input::merge(["page" => $this->page]);
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
    	$campus = $this->user->defaultAddress()->campus;
      $paginator = Order::where('campus_id', $campus->id)->with('orderer', 'deliver')->where('status', 'ordered')->orderBy('created_at', 'asc')->paginate($this->limit);
      return $this->trans4page($paginator);
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
    * HTTP/1.1 200 OK
      {
        "data": {
          "id": 100,
          "order_no": "35161123154028",
          "orderer": {
            "name": "Julian Padberg IV",
            "phone": "18884950881"
          },
          "deliver": null,
          "address": "南京7大学numquam校区et宿舍1",
          "total": 81.5,
          "apponitment_at": "2003/10/23 - 23:21",
          "status": "已提现",
          "foods": {
            "data": [
              {
                "id": 2291,
                "name": "odio食品",
                "price": "2.0",
                "quntity": null,
                "original_price": "3.5",
                "img": "http://lorempixel.com/50/50/?79622",
                "sold": 57,
                "canteen": "blanditiis食堂"
              },
              ......
            ]
          }
        }
      }
    *
    */ 
    public function getOne($order_id)
    {
        $order = Order::with('foods', 'deliver', 'orderer')->where('id', $order_id)->first();
        $this->checkNull($order);
        $resource = new Fractal\Resource\Item($order, new OrderTransformer);
        return $this->fractal->parseIncludes('foods')->createData($resource)->toArray();

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
        $ago = Carbon::now()->subMinutes(3);
        $paginator = Order::where(['type'=>'wxpay', 'deliver_id'=>null, 'status'=>'paid'])->where('user_id', '<>', $this->user->id)->where('paid_at', '>', $ago)->with('orderer')->orderBy('id', 'ASC')->paginate($this->limit);
        return $this->trans4page($paginator);      
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
        $paginator = Order::where(['type'=>'wxpay', 'user_id'=>$this->user->id])->orderBy('id', 'DESC')->with('deliver')->paginate($this->limit);
        return $this->trans4page($paginator);
    }


    /**
    * @api {get} /order/uncompleted_sale  我已接单未完成列表
    * @apiVersion 1.0.0
    * @apiName getMyUncompletedSalePage
    * @apiGroup Order
    * @apiUse openidParam
    * @apiSuccessExample 成功返回:
    * HTTP/1.1 200 OK
      {
        "data": [
          {
            "id": 1099,
            "order_no": "368161123154046",
            "orderer": {
              "name": "Dr. Narciso O'Kon",
              "phone": "14849947418"
            },
            "deliver": {
              "name": "LMercury小敏",
              "phone": "18622525566"
            },
            "address": "合肥9大学laborum校区asperiores宿舍3",
            "total": 74.5,
            "apponitment_at": "2013/12/13 - 17:17",
            "status": "配送中"
          },
          ......
        ]
      }
    *
    */ 
    public function uncompletedSale()
    {
        $orders = Order::where(['type'=>'wxpay', 'deliver_id'=>$this->user->id, 'status'=>'taken'])->orderBy('taken_at', 'DESC')->with('orderer')->get();
        $resource = new Fractal\Resource\Collection($orders, new OrderTransformer);
        return $this->fractal->createData($resource)->toJson();

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
        $paginator = Order::where(['type'=>'wxpay', 'deliver_id'=>$this->user->id])->whereIn('status', ['received', 'delivered', 'withdrawed'])->orderBy('delivered_at', 'DESC')->with('orderer')->paginate($this->limit);
        return $this->trans4page($paginator);
    }

    protected function trans4page($paginator)
    {
      $orders = $paginator->getCollection();
      $resource = new Fractal\Resource\Collection($orders, new OrderTransformer);
      $resource->setPaginator(new Fractal\Pagination\IlluminatePaginatorAdapter($paginator));
      return $this->fractal->createData($resource)->toJson();
    }

    /**
    * @api {get} /orders  订单条件分页
    * @apiVersion 1.0.0
    * @apiName getOrdersByQueryStr
    * @apiGroup Order
    * @apiUse openidParam
    * @apiParam {String} billing_id 订单交易号
    * @apiParam {String} type       订单交易类型
    * @apiParam {String} order_no 订单流水号
    * @apiParam {Number} user_id   下单用户ID
    * @apiParam {String} status 订单状态
    * @apiParam {Number} school_id 订单所属学校ID
    * @apiParam {Number} campus_id 订单所属校区ID
    * @apiParam {Number} dorm_id   订单所属宿舍ID
    * @apiParam {Number} school_id 订单所属学校ID
    * @apiParam {String} appointment_at   订单预约时间
    * @apiParam {Bool} direction   顺序或倒序
    *
    */ 
    public function getList(Request $request, Order $order)
    {
      $fields   = ['billing_id', 'type', 'order_no', 'user_id', 'status', 'school_id', 'campus_id', 'dorm_id'];
      $sortkeys = ['id', 'school_id', 'campus_id', 'dorm_id', 'appointment_at'];
      $map = [];
      foreach ($fields as $key){
        if ($request->$key){
          $map = array_merge($map, [$key => $request->$key]);
        }
      }
      $sort = ($request->order && in_array($reqeust->sort, $orders)) ? $request->sort : 'id';
      $direction = $request->direction ? 'asc' : 'desc';
      $paginator = $order->with('orderer', 'deliver')->where($map)->orderBy($sort, $direction)->paginate($this->limit);
      return $this->trans4page($paginator); 
    }

    public function getListByCanteen(Request $request, $canteen_id)
    {
        $order_ids = Canteen::findOrFail($canteen_id)->orders->pluck('id')->toArray();
       $paginator = Order::with('orderer')->whereIn('id', $order_ids)->paginate($this->limit);
       return $this->trans4page($paginator);     
    }
}
