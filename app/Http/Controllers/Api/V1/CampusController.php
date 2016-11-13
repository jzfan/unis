<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\School\Campus;
use Illuminate\Support\Facades\Input;

class CampusController extends Controller
{
    public function indexForSelect(Request $request)
    {
        $limit = $request->limit ? : config('site.perPage');
        $page  = $request->page ? : 1;
    	Input::merge(["page" => $page]);
		$campuses = Campus::select('id', 'name as text')->simplePaginate($limit)->toArray();    	
    	return $campuses;
    }

    public function queryBySchool($school_id)
    {
    	$campuses = Campus::select('id', 'name as text')->where('school_id', $school_id)->orderBy('name')->get()->toArray();
    	return $campuses;
    }
}
