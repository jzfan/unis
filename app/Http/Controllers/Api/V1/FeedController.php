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

    public function destroy($feed_id)
    {
    	$feed = Feed::findOrFail($feed_id);
    	if ($feed->receiver_id != $this->user->id){
    		abort(401, 'unauthorized');
    	}
    	return 'success';
    }
}
