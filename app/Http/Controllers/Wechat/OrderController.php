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

    public function show($order_no)
    {
    	return view('wechat.order.show', compact('order_no'));
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
    	if ($request->status){
			return Order::where('status', $request->status)->with('order_items.food')->paginate($limit);
    	}
    	return Order::paginate($limit);  	
    }

    public function orderedByUser()
    {
        //test
        // $this->getWechatUser()->id = 992;  
        $user = $this->getWechatUser();  
       return Order::where(['type'=>'wxpay', 'user_id'=>$user->id])->orderBy('paid_at','desc')->with('order_items.food')->get();
    }

    public function completedBuy()
    {
         //test
         // $this->getWechatUser()->id = 915;
        $user = $this->getWechatUser();
        return Order::where(['type'=>'wxpay', 'user_id'=>$user->id])->whereIn('status', ['received', 'withdrawed'])->orderBy('withdrawed_at', 'DESC')->with('order_items.food')->get();
    }

    public function completedSale()
    {
         //test
         // $this->getWechatUser()->id = 915;
        $user = $this->getWechatUser();
        return Order::where(['type'=>'wxpay', 'deliver_id'=>$user->id])->whereIn('status', ['received', 'withdrawed'])->orderBy('withdrawed_at', 'DESC')->with('order_items.food')->get();
    }

    public function uncompletedBuy()
    {
         //test
         // $this->getWechatUser()->id = 305;
        $user = $this->getWechatUser();
        return Order::where(['type'=>'wxpay', 'user_id'=>$user->id])->whereNotIn('status', ['withdrawed', 'received'])->orderBy('taken_at', 'DESC')->with('order_items.food')->get();
    }

    public function uncompletedSale()
    {
         //test
         // $this->getWechatUser()->id = 305;
        $user = $this->getWechatUser();
        return Order::where(['type'=>'wxpay', 'deliver_id'=>$user->id])->whereIn('status',['taken', 'delivered'])->orderBy('taken_at', 'DESC')->with('order_items.food')->get();
    }

    public function confirmReceived()
    {
        return null;//'received.'
    }
}