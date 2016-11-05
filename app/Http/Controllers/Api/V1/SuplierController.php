<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Suplier\Suplier;

class SuplierController extends Controller
{
    public function index()
    {
		$supliers = Suplier::select('id', 'company as text')->get()->toArray();    	
    	return $supliers;
    }
}
