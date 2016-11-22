<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\School\Dorm;

class DormController extends Controller
{
	/**
	* @api {get} /dorms_of_campus/{campus_id} 根据校区取出宿舍列表
	* @apiVersion 1.0.0
	* @apiName listDormsByCampus
	* @apiGroup Dorm
	* @apiParam {Number} campus_id 校区ID
	* @apiSuccessExample 成功返回:
	*     HTTP/1.1 200 OK
	    [
	      {
	        "id": 24,
	        "text": "est宿舍"
	      },
	      {
	        "id": 25,
	        "text": "repellat宿舍"
	      },
	      {
	        "id": 26,
	        "text": "doloribus宿舍"
	      }
	    ]
	*
	*/
    public function listByCampus($campus_id)
    {
    	$dorms = Dorm::select('id', 'name as text')->where('campus_id', $campus_id)->get()->toArray();
    	return $dorms;
    }

    /**
    * @api {get} /campus/query_by_dorm/{dorm_id} 根据宿舍查校区
    * @apiVersion 1.0.0
    * @apiName getCampusByDorm
    * @apiGroup Dorm
    * @apiParam {Number} dorm_id 宿舍ID
    * @apiSuccessExample 成功返回:
    *     HTTP/1.1 200 OK
        {
          "id": 1,
          "school_id": 1,
          "name": "culpa校区",
          "address": null,
          "x": null,
          "y": null,
          "geohash": null,
          "status": "禁用",
          "created_at": "2016-11-21 16:44:04",
          "updated_at": "2016-11-21 16:44:04"
        }
    *
    */
    public function getCampusBy($dorm_id)
    {
    	return Dorm::find($dorm_id)->campus->toArray();
    }
}
