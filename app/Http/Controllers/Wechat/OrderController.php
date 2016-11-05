<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Wechat;
use App\Unis\User\User;

class OrderController extends Controller
{

    public function index(Request $request)
    {
    	if (!session('registered')){
    		session(['target_url'=>'wechat/order']);
    		return view('wechat.user.register');
    	}
    	return view('wechat.order.index');
    }

    public function index2()
    {
    	return view('wechat.order.index');
    }

    public function my()
    {
    	return view('wechat.order.my');
    }
}