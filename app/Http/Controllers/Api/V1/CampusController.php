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

    /**
     * @api {get} campuses_of_school/{school_id} 根据学校ID查询下属校区
     * @apiVersion 1.0.0
     * @apiName  queryBySchool
     * @apiGroup Campus
     * @apiParam {Number} school_id 学校ID
     *
     * @apiSuccessExample 成功返回:
     * HTTP/1.1 200 OK
     [
       {
         "id": 18,
         "text": "corporis校区"
       },
       {
         "id": 17,
         "text": "dolore校区"
       }
     ]
     */
    public function queryBySchool($school_id)
    {
    	$campuses = Campus::select('id', 'name as text')->where('school_id', $school_id)->orderBy('name')->get()->toArray();
    	return $campuses;
    }
}
