<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Unis\Message\Report;
use App\Http\Requests\ReportRequest;

class ReportController extends BaseController
{
    public function store(ReportRequest $request)
    {
    	Report::create([
    		'user_id' => $this->user->id,
    		'content' => $request->content
    	]);
    	return 'ok';
    }
}
