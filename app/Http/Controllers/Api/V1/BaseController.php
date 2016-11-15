<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\User\User;

class BaseController extends Controller
{
 	public $user;

 	public function __construct(Request $request)   
 	{
 		$this->user = User::where('wechat_openid', $request->openid)->first();
 		if (! $this->user){
 			abort(401, 'Unauthorized action.');
 		}
 	}
}
