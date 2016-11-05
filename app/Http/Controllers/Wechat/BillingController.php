<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BillingController extends Controller
{
    public function balance()
    {
    	return view('wechat.billing.balance');
    }
}
