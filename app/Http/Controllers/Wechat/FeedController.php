<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FeedController extends Controller
{
	public function index()
	{
		return view('wechat.feed.index');
	}

	public function show()
	{
		return view('wechat.feed.show');
	}
}
