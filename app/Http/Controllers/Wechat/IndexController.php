<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Wechat;
use App\Unis\User\User;

class IndexController extends Controller
{

    public function index()
    {
    	return view('wechat.index');
    }

    public function about()
    {
    	return view('wechat.about');
    }

    public function report()
    {
    	return view('wechat.report');
    }
}