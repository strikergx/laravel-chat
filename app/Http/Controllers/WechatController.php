<?php

namespace App\Http\Controllers;

use EasyWeChat\Message\Text;
use Log;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

class WechatController extends Controller
{

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve(Request $request)
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $wechat = app('wechat');
//        $wechat->server->setMessageHandler(function($message){
//            return "欢迎关注 overtrue！";
//        });
//        $wechat = app('wechat');
//        $notice = $wechat->notice;
//        $userId = 'oumluwx3t2ZnTzn_ght8g7UZOe-4';
//        $templateId = 'Rjf7c-f93efVUsP7HIYcx2MYSwINqK6BiIGm0QgYjRw';
//        $url = 'http://139.199.116.94/wechat';
//        $data = array(
//            "first"  => "恭喜你购买成功！",
//            "name"   => "巧克力",
//            "price"  => "39.8元",
//            "remark" => "欢迎再次购买！",
//        );
//
//        $result = $notice->uses($templateId)->withUrl($url)->andData($data)->andReceiver($userId)->send();
//        var_dump($result);
//        $wechat->server->setMessageHandler(function ($message) {
//            switch ($message->MsgType) {
//                case 'event':
//                    return '收到事件消息';
//                    break;
//                case 'text':
//                    return '收到文字消息';
//                    break;
//                case 'image':
//                    return '收到图片消息';
//                    break;
//                case 'voice':
//                    return '收到语音消息';
//                    break;
//                case 'video':
//                    return '收到视频消息';
//                    break;
//                case 'location':
//                    return '收到坐标消息';
//                    break;
//                case 'link':
//                    return '收到链接消息';
//                    break;
//                // ... 其它消息
//                default:
//                    return '收到其它消息';
//                    break;
//            }
//            // ...
//        });
        $data = $request->input();
        $openId = 'oumluwx3t2ZnTzn_ght8g7UZOe-4';
        Log::info('return response.');
        $message = new Text($data);
        $result = $wechat -> staff -> message($message) -> to($openId) -> send();


        //return $wechat->server->serve();
    }
}