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

    public function show()
    {
    	return view('wechat.order.show');
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
       return Order::where(['type'=>'wxpay', 'user_id'=>$user->id])->with('order_items.food')->get();
    }

    public function completed()
    {
         //test
         // $this->getWechatUser()->id = 915;
        $user = $this->getWechatUser();
        return Order::where(['type'=>'wxpay', 'user_id'=>$user->id, 'status'=>'withdrawed'])->with('order_items.food')->get();
    }

    public function uncompleted()
    {
         //test
         // $this->getWechatUser()->id = 305;
        $user = $this->getWechatUser();
        return Order::where(['type'=>'wxpay', 'user_id'=>$user->id])->where('status', '<>', 'withdrawed')->with('order_items.food')->get();
    }

    public function confirmReceived()
    {
        return null;//'received.'
    }
}