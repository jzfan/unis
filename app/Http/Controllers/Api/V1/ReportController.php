<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Unis\Message\Report;
use App\Http\Requests\ReportRequest;

class ReportController extends BaseController
{
	/**
	* @api {post} report  意见反馈
	* @apiVersion 1.0.0
	* @apiName postReport
	* @apiGroup Report
	* @apiUse openidParam
	* @apiParam {String} content 反馈内容，不少于10个字
	* @apiUse SuccessReturn  
	*/ 
    public function store(ReportRequest $request)
    {
    	Report::create([
    		'user_id' => $this->user->id,
    		'content' => $request->content
    	]);
    	return 'success';
    }
}
