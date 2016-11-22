<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\User\User;

class BaseController extends Controller
{
	/**
	* @apiDefine UserNotFoundError
	* @apiError UserNotFound  这个<code>openid</code> 的用户未找到.
	* @apiErrorExample 404 用户未找到:
	* HTTP/1.1 404 Not Found
	* {
	*    "message": "User Not Found.",
	*    "status_code": 404
	* }
	**/

	/**
	* @apiDefine openidParam
 	* @apiParam {String} openid 微信用户openid
	**/

	/**
	* @apiDefine SuccessReturn
	* @apiSuccessExample 成功返回:
	* HTTP/1.1 200 OK
	  success
	*
	*/ 

 	public $user;

 	public function __construct(Request $request)   
 	{
 		if ($request->openid == null){
 			abort(401);
 		}
 		$this->user = User::where('wechat_openid', $request->openid)->first();
 		if (! $this->user){
 			abort(404, 'User Not Found.');
 		}
 	}
}
