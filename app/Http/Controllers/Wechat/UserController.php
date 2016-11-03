<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
    	$wechat = app('wechat');
    	$users = $wechat->user->lists();
    	dd($users);

    }
}
