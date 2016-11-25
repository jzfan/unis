<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Order\Order;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class OrderController extends Controller
{

    public function status()
    {
        return view('wechat.order.status');
    }

    public function index()
    {
    	return view('wechat.order.index');
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
        $user = getWechatUser();
        $campus_id = $user->defaultAddress()->campus_id;
    	if ($request->status == 'paid'){
            return Order::where(['status'=>'paid', 'campus_id'=>$campus_id])->where('user_id', '<>', $user->id)->with('order_items.food')->orderBy('id', 'desc')->paginate($limit);
        }else{
            return Order::where(['status'=>$request->status, 'campus_id'=>$campus_id])->with('order_items.food')->orderBy('id', 'desc')->paginate($limit);
        }	
    }

    public function orderedByUser()
    {
        $user = getWechatUser();  
       $orders = Order::with('order_items.food', 'orderer')->where(['type'=>'wxpay', 'user_id'=>$user->id])->orderBy('id','desc')->get();
       return $orders;
    }

    // public function allBuy()
    // {
    //     $user = getWechatUser();
    //     return Order::where(['type'=>'wxpay', 'user_id'=>$user->id])->orderBy('id', 'DESC')->with('order_items.food', 'deliver')->get();
    // }

    // public function completedSale()
    // {
    //     $user = getWechatUser();
    //     return Order::where(['type'=>'wxpay', 'deliver_id'=>$user->id])->whereIn('status', ['received', 'delivered', 'withdrawed'])->orderBy('delivered_at', 'DESC')->with('order_items.food', 'orderer')->get();
    // }

     public function completedSaleToday()
    {
        $start = (new Carbon('now'))->hour(0)->minute(0)->second(0);
        $end = (new Carbon('now'))->hour(23)->minute(59)->second(59);
        $user = getWechatUser();
        return Order::where(['type'=>'wxpay', 'deliver_id'=>$user->id])->whereBetween('delivered_at', [$start , $end])->whereIn('status', ['received', 'delivered', 'withdrawed'])->orderBy('delivered_at', 'DESC')->with('order_items.food', 'orderer')->get();
    }

//未完成的买方
    public function uncompletedBuy()
    {
        $user = getWechatUser();
        return Order::where(['type'=>'wxpay', 'user_id'=>$user->id])->whereIn('status', ['paid', 'taken', 'delivered'])->orderBy('id', 'DESC')->with('order_items.food', 'deliver')->get();
    }

//我已接单未完成
    // public function uncompletedSale()
    // {
    //     $user = getWechatUser();
    //     return Order::where(['type'=>'wxpay', 'deliver_id'=>$user->id, 'status'=>'taken'])->orderBy('taken_at', 'DESC')->with('order_items.food', 'orderer')->get();
    // }
//没人接单的
    // public function unTakenSale()
    // {
    //     $user = getWechatUser();
    //     return Order::where(['type'=>'wxpay', 'deliver_id'=>null, 'status'=>'paid'])->with('order_items.food', 'orderer')->where('user_id', '<>', $user->id)->orderBy('id', 'ASC')->get();      
    // }

    public function confirmReceived()
    {
        $user = getWechatUser();
        return Order::where(['type'=>'wxpay', 'user_id'=>$user->id, 'status'>'received'])->orderBy('id', 'DESC')->with('order_items.food', 'orderer')->get();
    }

}