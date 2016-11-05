<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests\WechatUserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // public function index()
    // {
    // 	$wechat = app('wechat');
    // 	$users = $wechat->user->lists();
    // 	return $users;
    // }

    // public function store(WechatUserRequest $request)
    // {
    // 	dd($request->input());
    // }

    public function show()
    {
    	return view('wechat.user.profile');
    }

    public function favorite()
    {
    	return view('wechat.user.favorite');
    }

    public function address()
    {
    	return view('wechat.user.address');
    }

    public function message()
    {
    	return view('wechat.user.message');
    }
}
