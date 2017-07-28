<?php
namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use EasyWeChat\Message\Text;
use EasyWeChat\Message\Image;
use EasyWeChat\Message\News;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;


class MesController extends Controller
{
    public function send(Request $request)
    {
        $wechat = app('wechat');
        $image = new Image(['media_id' => '2lOJCeMkkDGHzKQmO4X7ob4_T3rumsuKpjHqIZShWfexPCIqQBfP7k-RInL6Vawa']);
        //$message = new Text(['content' => 'Hello']);
        $data = $request -> all();
//        $news = new News([
//            'title'       => 'HELLO NEWS',
//            'description' => '一个测试',
//            'url'         => '139.199.116.94/haha',
//            'image'       => $image,
//            // ...
//        ]);
        $news = new News($data);
        $result = $wechat -> staff -> message($news) -> to('oumluwx3t2ZnTzn_ght8g7UZOe-4')-> send();
        return $result;
    }

    public function user()
    {
        $app = app('wechat');
        $userService = $app ->user;
        $remark = $userService -> remark('oumluwx3t2ZnTzn_ght8g7UZOe-4' , '骨灰粉');
        $user = $userService -> get('oumluwx3t2ZnTzn_ght8g7UZOe-4');

        //$user['remark'] = $remark;
        return $user;
    }

    public function haha()
    {
        return 'haha';
    }

    public function menu()
    {
        $app = app('wechat');
        $accesstoken = $app -> access_token;
        $token = $accesstoken -> getToken();
        return ['access_token' => $accesstoken , 'token' => $token];
    }
}