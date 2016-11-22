<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Message\Feed;

class FeedController extends BaseController
{
    /**
    * @api {get} /feed  查用户收到消息
    * @apiVersion 1.0.0
    * @apiName getFeedList
    * @apiGroup Message
    * @apiParam {String} openid 微信用户openid
    * @apiSuccessExample 成功返回:
    *     HTTP/1.1 200 OK
    {
      "feeds": [
        {
          "id": 1,
          "order_id": 367,
          "sender_id": 1,
          "receiver_id": 1003,
          "status": "send",
          "type": "received",
          "created_at": "2016-11-21 16:44:27",
          "updated_at": "2016-11-21 16:44:27"
        },
        ......
      ]
    }
    */
    public function getList()
    {
    	return Feed::where('receiver_id', $this->user->id)->get();
    }

    /**
    * @api {delete} /feed/{feed_id}  删除一条消息
    * @apiVersion 1.0.0
    * @apiName deleteOneFeed
    * @apiGroup Message
    * @apiUse openidParam 
    * @apiParam {Number} feed_id 消息ID
    * @apiUse SuccessReturn 
    */
    public function delete($feed_id)
    {
    	$feed = Feed::find($feed_id);
        if (!$feed){
            abort(404, 'Feed Nout Found');
        }
        if ($feed->receiver_id != $this->user->id){
            abort(401);
        }
        $feed->delete();
        return 'success';
    }

    /**
    * @api {get} /feed/{feed_id} 取一条消息
    * @apiVersion 1.0.0
    * @apiName getOneFeed
    * @apiGroup Message
    * @apiParam {Number} feed_id 消息ID
    * @apiUse openidParam 
    * @apiSuccessExample 成功返回:
    *     HTTP/1.1 200 OK
    {
      "feed": {
        "id": 1,
        "order_id": 367,
        "sender_id": 1,
        "receiver_id": 1003,
        "status": "send",
        "type": "received",
        "created_at": "2016-11-21 16:44:27",
        "updated_at": "2016-11-21 16:44:27"
      }
    }
    */
    public function getOne($feed_id)
    {
        $feed = Feed::find($feed_id);
        if (! $feed){
            abort(404, 'Feed Not Found.');
        }
       if (! $this->checkAuth($feed)){
            abort(401);
       }
        return $feed;
    }

    protected function checkAuth(Feed $feed)
    {
        if ($feed->sender_id != $this->user->id && $feed->receiver_id != $this->user->id){
            return false;
        }
        return true;
    }
}
