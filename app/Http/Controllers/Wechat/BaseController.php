<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\User\User;

class BaseController extends Controller
{

	protected function getWechatUser()
	{
		$openid = session('wechat.oauth_user.id');
	    $user = User::where('wechat_openid', $openid)->first();
	    if (! $user){
	        return response()->json(['message' => 'cant find user', 'state' => 'error']);           
	    }
	    $user->address = $user->defaultAddress()->text();
	    return $user;        
	}

}
