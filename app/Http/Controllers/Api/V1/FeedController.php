<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Message\Feed;

class FeedController extends BaseController
{
    public function index()
    {
    	return Feed::where('sender_id', $this->user->id)->get();
    }
}
