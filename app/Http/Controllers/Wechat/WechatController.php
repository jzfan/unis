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

        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function($message) use ($wechat){
            switch ($message->MsgType) {
                    case 'event': // 事件
                        return $this->dispatchEvent($message);
                    case 'text': // 文本消息
                        if ($message->Content == '.741')
                        {
                            return "http://192.168.1.200/wechat/index";
                        }
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
                    case 'shortvideo':
                        # 小视频消息...
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
        return $wechat->server->serve();
    }

    public function myMenu($wechat)
    {
        $url = env('APP_URL');
        $buttons = [
            [
                "type" => "view",
                "name" => '我要点餐',
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
                   case 'subscribe': // 订阅
                        return "您好，欢迎关注Uniserve，您可以在线选购食堂套餐，单品和饮品。也可以加入我们配送员大家庭，为其他同学服务的同时也可以创业，赚取一定的生活补贴哦~期待您的加入。点击下方菜单的{我要点餐}进入点餐和接单页面。更有百万餐补等你来领！戳一戳：<a href='http://g.eqxiu.com/s/D0Ez8TIt'>活动详情</a> 上线倒计时3天哦~敬请期待";
                    case 'unsubscribe': // 取消订阅
                        break;
                    case 'CLICK' : //菜单事件
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
