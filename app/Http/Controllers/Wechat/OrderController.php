<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
    	return view('wechat.order.index');
    }

    public function edit()
    {
    	return view('wechat.order.edit');
    }
}
