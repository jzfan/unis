<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    public function index()
    {
    	return view('backend.sales.index');
    }
}
