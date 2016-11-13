<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\School\School;

class SchoolController extends Controller
{
    public function index()
    {
		$schools = School::select('id', 'name as text')->get()->toArray();    	
    	return $schools;
    }

    public function indexDt()
    {
        $schools = School::all()->toArray();
        return $schools;
    }
    // public function index2(Request $request)
    // {
    // 	$region = $request->input('region');
    // 	$data = array_map('trim', explode('/', $region));
    // 	$schools = School::select('id', 'name')->where('city', $data[1])->get();
    // 	return $schools;
    // }

    public function queryByKeyword($keyword)
    {
        $schools = School::where('name', 'like', '%'.$keyword.'%')->get();
        return $schools;
    }
}
