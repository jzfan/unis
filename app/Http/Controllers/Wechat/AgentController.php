<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AgentController extends Controller
{
    public function index()
    {
        $user = getWechatUser();
        $campus_id = $user->campus()->id;
    	return view('wechat.agent.index', compact('campus_id'));
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

    public function report()
    {
        return view('wechat.agent.report');
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
