<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests\WechatUserRequest;
use App\Http\Controllers\Controller;
use App\Unis\User\User;

class UserController extends BaseController
{

    public function wxUserInfo()
    {
        $user = session('wechat.oauth_user');
        return ['id'=>$user->id, 'nickname'=>$user->nickname, 'email'=>$user->email, 'avatar'=>$user->avatar];
    }

    public function register(Request $request)
    {
        return view('wechat.user.register');
    }

    public function show()
    {
    	return view('wechat.user.profile');
    }

    public function address()
    {
    	return view('wechat.user.address');
    }

    public function message()
    {
    	return view('wechat.user.message');
    }

    public function getInfo()
    {
        $user = session('wechat.oauth_user')->toArray();
        return response()->json($user);
    }

    public function info()
    {
        $user = session('wechat.oauth_user');
        return User::where('wechat_openid', $user->id)->first();
    }
}
