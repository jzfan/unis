<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Order\Order;
use Carbon\Carbon;

class OrderController extends BaseController
{
    public function index()
    {
    	$campus = $this->user->defaultAddress()->campus;
        return Order::where('campus_id', $campus->id)->with('order_items.food.shop.canteen', 'orderer')
                            ->where('status', 'ordered')->orderBy('created_at', 'asc')->simplePaginate(config('site.perPage'));
    }

    public function store(OrderRequest $request)
    {
    	Order::create([

    	]);
    }
    
    //接单
    public function taken($order_id)
    {
    	$order = Order::where(['id'=>$order_id, 'status'=>'paid'])->first();
        $this->checkNull($order);

        $order->update([
            'deliver_id' => $this->user->id,
            'status' => 'taken',
            'taken_at' => Carbon::now()
        ]);
    	return 'success';
    }

    //确认送达
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

    //确认收到
    public function received($order_id)
    {
    	$order = Order::where(['id'=>$order_id, 'status'=>'delivered'])->first();
    	$this->checkNull($order);
    	$order->status = 'received';
    	$order->received_at = Carbon::now();
    	$order->save();
    	return 'success';
    }

    private function checkNull($order)
    {
    	if (! $order){
    		abort(403, 'cant find order');
    	}
    }

    public function show($order_id)
    {
        $order = Order::with('order_items.food')->where('id', $order_id)->first();
        $this->checkNull($order);
        return $order;
    }
}
