<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redis;
use Cache;
use App\Unis\Suplier\Food;

class IndexController extends Controller
{
    public function index()
    {
    	return view('frontend.index');
    }

    public function wechat()
    {
    	return view('wechat.index');
    }

    public function set($id)
    {
    	Redis::zIncrBy('articleViews', 1, 'article:'.$id);
    }

    public function get()
    {
    	$hots = Redis::zRevRange('articleViews', 0, -1);
    	foreach($hots as $index => $hot){
    		$id    = str_replace('article:', '', $hot);
    		$views = Redis::zScore('articleViews', $hot);
    		echo $index+1 . ')'. 'the article id is '.$id.', it has '.$views.' views<br>';
    	}
    }

    public function show()
    {
    	return Cache::remember('post_cache', 1, function () {
    		return Post::first();
    	});
    }
}