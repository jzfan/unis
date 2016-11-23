<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Log;

class WechatController extends Controller
{

    public function serve()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function($message) use ($wechat){
            switch ($message->MsgType) {
                    case 'event':
                        return $this->dispatchEvent($message);
                    case 'text':
                        return "欢迎关注Uniserve。"; 
                        // $wechat->user->get($message->FromUserName)->nickname;
                    case 'image':
                        # 图片消息...
                        break;
                    case 'voice':
                        # 语音消息...
                        break;
                    case 'video':
                        # 视频消息...
                        break;
                    case 'location':
                        # 坐标消息...
                        break;
                    case 'link':
                        # 链接消息...
                        break;
                    // ... 其它消息
                    default:
                        # code...
                        break;
                }
        });

        $this->myMenu($wechat);
        Log::info('return response.');
        return $wechat->server->serve();
    }

    public function myMenu($wechat)
    {
        $url = env('APP_URL');
        $buttons = [
            [
                "type" => "view",
                "name" => '我要点餐',
                // "url"  => "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".env('WECHAT_APPID')."&redirect_uri=".$url."wechat/order&response_type=code&scope=snsapi_base"
                "url" => $url.'wechat/index'
            ],
            [
                "type" => "view",
                "name" => "活动",
                "url" => 'http://g.eqxiu.com/s/D0Ez8TIt'
            ],

        ];
        $wechat->menu->add($buttons);
    }

    public function dispatchEvent($message)
    {
        switch ($message->Event) {
                   case 'subscribe':
                        return "您好，欢迎关注Uniserve，您可以在线选购食堂套餐，单品和饮品。也可以加入我们配送员大家庭，为其他同学服务的同时也可以创业，赚取一定的生活补贴哦~期待您的加入。点击下方菜单的{我要点餐}进入点餐和接单页面。更有百万餐补等你来领！戳一戳：<a href='http://g.eqxiu.com/s/D0Ez8TIt'>活动详情</a> 上线倒计时3天哦~敬请期待";
                    case 'CLICK' :
                        return $this->dispatchClick($message);
                   default:
                       break;
               }
    }

    public function dispatchClick($message)
    {
        switch ($message->EventKey) {
            case 'activity':
                return 'activity';
            
            default:
                break;
        }
    }
}
