<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests\WechatUserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
    	$wechat = app('wechat');
    	$users = $wechat->user->lists();
    	return $users;
    }

    public function store(WechatUserRequest $request)
    {
    	dd($request->input());
    }
}
