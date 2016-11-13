<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
	protected $user;

	public function __construct()
	{
		$this->middleware(function ($request, $next) {
		    $this->user = session('wechat.oauth_user');
		    return $next($request);
		});
	}

}
