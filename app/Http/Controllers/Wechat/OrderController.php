<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Wechat;
use App\Unis\User\User;

class OrderController extends Controller
{
    public function index(Request $request)
    {
    	$user = session('wechat.oauth_user');
    	dd($user);

    	// $name = $server->user->get($message->FromUserName)->nickname;
    	$openid = getWechatOpenid();
    	$user = User::where('wechat_openid', $openid)->first();
    	if ($user){
    		return view('wechat.order.index', compact('user'));
    	}
    	return view('wechat.register');
    }
}