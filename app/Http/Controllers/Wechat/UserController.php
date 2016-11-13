<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests\WechatUserRequest;
use App\Http\Controllers\Controller;
use App\Unis\User\User;

class UserController extends BaseController
{

    public function store(WechatUserRequest $request)
    {
        $data =  [
                    'role' => 'member', 
                    'name' => $this->user->nickname, 
                    'avatar' => $this->user->avatar,
                    'wechat_openid' => $this->user->id,
                    'email' => $this->user->email,
                    'dorm_id' => $request->dorm_id,
                    'room_number' => $request->room_number,
                    'phone' => $request->phone,

                ];
        User::create($data);
    	session()->put('registered', true);
        return redirect('/wechat/index');
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
}
