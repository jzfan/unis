<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\School\Canteen;

class CanteenController extends Controller
{
	/**
	* @api {get} /canteens_of_campus/{campus_id} 根据校区取出食堂列表
	* @apiVersion 1.0.0
	* @apiName listCanteensByCampus
	* @apiGroup Canteen
 	* @apiParam {Number} campus_id 校区ID
	* @apiSuccessExample 成功返回:
	*     HTTP/1.1 200 OK
	    [
	      {
	        "id": 17,
	        "text": "tempora食堂"
	      },
	      {
	        "id": 18,
	        "text": "unde食堂"
	      }
	    ]
	*
	*/
    public function listByCampus($campus_id)
    {
    	$canteens = Canteen::select('id', 'name as text')->where('campus_id', $campus_id)->get()->toArray();
    	return $canteens;
    }
}
