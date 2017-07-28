<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;


class StartController extends Controller
{
    public function start(Request $request)
    {
//        $config = [
//            'oauth' => [
//                'scopes' => ['snsapi_userinfo'],
//                'callback' => '/oauth_callback',
//            ],
//        ];
//
//        $app = new Application($config);
//        $oauth = $app->oauth;
//        if (empty($_SESSION['wechat_user'])){
//            $_SESSION['target_url'] = 'user/profile';
//            return $oauth->redirect();
//        }
//        $user = $_SESSION['wechat_user'];
//        return $user;

        $config = [
            // ...
            'oauth' => [
                'scopes'   => ['snsapi_userinfo'],
                'callback' => '/oauth_callback',
            ],
            // ..
        ];
        $app = new Application($config);
        $oauth = $app->oauth;
        // 未登录
        if (empty($_SESSION['wechat_user'])) {
            $_SESSION['target_url'] = 'user/profile';
            //return $oauth->redirect();
            // 这里不一定是return，如果你的框架action不是返回内容的话你就得使用
            // $oauth->redirect()->send();
            $response = $app->oauth->scopes(['snsapi_userinfo'])
                ->setRequest($request)
                ->redirect();
            return $response;
        }
        // 已经登录过
        $user = $_SESSION['wechat_user'];
        return $user;

    }

    public function callback(Request $request)
    {
//        $config = [
//            'debug'  => true,
//            'app_id' => 'wx52bf5479ac29ed39',
//            'secret' => '3b8f60637396dcdd4393f09d7524fb55',
//            'token'  => '1234',
//        ];
//        $app = new Application($config);
//        $oauth = $app->oauth;
//        // 获取 OAuth 授权结果用户信息
//        $user = $oauth->user();
//        $_SESSION['wechat_user'] = $user->toArray();
//        $targetUrl = empty($_SESSION['target_url']) ? '/' : $_SESSION['target_url'];
//        header('location:'. $targetUrl); // 跳转到 user/profile

        $config = [
            // ...
        ];
        $app = new Application($config);
        $oauth = $app->oauth;
        // 获取 OAuth 授权结果用户信息
        $user = $oauth->setRequest($request)->user();
        $_SESSION['wechat_user'] = $user->toArray();
        $targetUrl = empty($_SESSION['target_url']) ? '/' : $_SESSION['target_url'];
        header('location:'. $targetUrl); // 跳转到 user/profile
        return ;


    }
}