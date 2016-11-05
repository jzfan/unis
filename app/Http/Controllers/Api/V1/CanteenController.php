<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\School\Canteen;

class CanteenController extends Controller
{
    public function queryByCampus($campus_id)
    {
    	$canteens = Canteen::select('id', 'name as text')->where('campus_id', $campus_id)->get()->toArray();
    	return $canteens;
    }
}
