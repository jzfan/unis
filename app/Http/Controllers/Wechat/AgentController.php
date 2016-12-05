<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AgentController extends Controller
{
    public function index()
    {
    	return view('wechat.agent.index');
    }

    public function orderIndex()
    {
    	return view('wechat.agent.orderIndex');
    }

    public function profile()
    {
    	return view('wechat.agent.profile');
    }

    public function balance()
    {
    	return view('wechat.agent.balance');
    }

    public function message()
    {
    	return view('wechat.agent.message');
    }

    public function profileOrder()
    {
        return view('wechat.agent.profileOrder');
    }

}
