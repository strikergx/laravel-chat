<?php
namespace app\Http\Controllers;

use EasyWeChat\Foundation\Application;

class ServerController extends Controller
{
    public function server()
    {
        $wechat = app('wechat');
        $notice = $wechat->notice;
        $userId = 'oumluwx3t2ZnTzn_ght8g7UZOe-4';
        $templateId = 'Rjf7c-f93efVUsP7HIYcx2MYSwINqK6BiIGm0QgYjRw';
        $url = 'http://139.199.116.94/wechat';
        $data = array(
            "first"  => "恭喜你购买成功！",
            "name"   => "巧克力",
            "price"  => "39.8元",
            "remark" => "欢迎再次购买！",
        );
        $result = $notice->uses($templateId)->withUrl($url)->andData($data)->andReceiver($userId)->send();
        var_dump($result);
    }
}