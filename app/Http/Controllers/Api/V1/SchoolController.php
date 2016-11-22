<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\School\School;

class SchoolController extends Controller
{

    /**
    * @api {get} school  学校列表
    * @apiVersion 1.0.0
    * @apiName listSchool
    * @apiGroup School
    * @apiSuccessExample 成功返回:
    * HTTP/1.1 200 OK
    [
      {
        "id": 1,
        "text": "南昌2大学"
      },
        ......
    ]
    */ 
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

    /**
    * @api {get} school/like/{keyword}  根据关键字查学校
    * @apiVersion 1.0.0
    * @apiName querySchoolByKeyword
    * @apiGroup School
    * @apiParam {String} keyword 关键字
    * @apiSuccessExample 成功返回:
    * HTTP/1.1 200 OK
    {
      "schools": [
        {
          "id": 1,
          "name": "南昌2大学",
          "province": "江苏省",
          "city": "南昌",
          "block": "屈 Street",
          "address": "58 牟 Street",
          "x": 1,
          "y": -41,
          "geohash": "k0b87vmd9g1",
          "status": "启用",
          "created_at": "2016-11-21 16:44:04",
          "updated_at": "2016-11-21 16:44:04"
        }
      ]
    }
    */    
    public function queryByKeyword($keyword)
    {
        $schools = School::where('name', 'like', '%'.$keyword.'%')->get();
        return $schools;
    }
}
