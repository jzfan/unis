<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Order\Order;
use Illuminate\Support\Facades\Input;

class OrderController extends BaseController
{

    public function status()
    {
        return view('wechat.order.status');
    }

    public function index()
    {
    	return view('wechat.order.index');
    }

    public function index2()
    {
        return view('wechat.order.index2');
    }

    public function index3()
    {
        return view('wechat.order.index3');
    }

    public function show($order_id)
    {
    	return view('wechat.order.show', compact('order_id'));
    }

    public function edit()
    {
    	return view('wechat.order.edit');
    }

    public function listByCampus()
    {
    	$dorms_id = Campus::find($campus_id)->dorms->pluck('id');
    	// return Order::whereIn()
    }

    public function getList(Request $request)
    {
		$limit = $request->limit ? : config('site.perPage');
        $page  = $request->page ? : 1;
    	Input::merge(["page" => $page]);
        $user = $this->getWechatUser();
        $campus_id = $user->defaultAddress()->campus_id;
    	if ($request->status == 'paid'){
            return Order::where(['status'=>'paid', 'campus_id'=>$campus_id])->where('user_id', '<>', $user->id)->with('order_items.food')->paginate($limit);
        }else{
            return Order::where(['status'=>$request->status, 'campus_id'=>$campus_id])->with('order_items.food')->paginate($limit);
        }	
    }

    public function orderedByUser()
    {
        $user = $this->getWechatUser();  
       $orders = Order::with('order_items.food', 'orderer')->where(['type'=>'wxpay', 'user_id'=>$user->id])->orderBy('paid_at','desc')->get();
       return $orders;
    }

    public function completedBuy()
    {
        $user = $this->getWechatUser();
        return Order::where(['type'=>'wxpay', 'user_id'=>$user->id])->whereIn('status', ['received', 'withdrawed'])->orderBy('withdrawed_at', 'DESC')->with('order_items.food', 'orderer')->get();
    }

    public function completedSale()
    {
        $user = $this->getWechatUser();
        return Order::where(['type'=>'wxpay', 'deliver_id'=>$user->id])->whereIn('status', ['received', 'withdrawed'])->orderBy('withdrawed_at', 'DESC')->with('order_items.food', 'deliver')->get();
    }

    public function uncompletedBuy()
    {
        $user = $this->getWechatUser();
        return Order::where(['type'=>'wxpay', 'user_id'=>$user->id])->whereNotIn('status', ['withdrawed', 'received'])->orderBy('taken_at', 'DESC')->with('order_items.food', 'orderer')->get();
    }

//我已接单未完成
    public function uncompletedSale()
    {
        $user = $this->getWechatUser();
        return Order::where(['type'=>'wxpay', 'deliver_id'=>$user->id])->whereIn('status',['taken', 'delivered'])->orderBy('taken_at', 'DESC')->with('order_items.food', 'deliver')->get();
    }
//没人接单的
    public function unTakenSale()
    {
        $user = $this->getWechatUser();
        return Order::where(['type'=>'wxpay', 'deliver_id'=>null, 'status'=>'paid'])->where('user_id', '<>', $user->id)->orderBy('paid_at', 'ASC')->with('order_items.food', 'orderer')->get();        
    }

    public function confirmReceived()
    {
        $user = $this->getWechatUser();
        return Order::where(['type'=>'wxpay', 'user_id'=>$user->id, 'status'>'received'])->orderBy('delivered_at', 'DESC')->with('order_items.food', 'orderer')->get();
    }

}