<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/8/3
 * Time: 9:33
 */

namespace App\Http\Controllers\Open;


use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

class WechatController extends OpenController
{
    private $app;

    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->app = new Application(config('wechat'));
    }

    /**
     * API分发回应微信服务端
     */
    public function index()
    {
        $server = $this->app->server;

        $server->setMessageHandler(function($message){

            return null;
        });

        $response = $server->serve();

        return $response;
    }

    public function menu()
    {
        $menu = $this->app->menu;

        $buttons = [
            [
                "type" => "view",
                "name" => "微校园",
                "url"  => "http://kdjx.sanchi.xin"
            ],
            [
                "type" => "view",
                "name" => "家校通",
                "url"  => "http://kdjx.sanchi.xin"
            ],
            [
                "name"       => "服务台",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "关于产品",
                        "url"  => "http://www.hnixue.com/Html/Pro/kdjx/"
                    ],
                    [
                        "type" => "view",
                        "name" => "联系我们",
                        "url"  => "http://kdjx.sanchi.xin"
                    ],
                    [
                        "type" => "view",
                        "name" => "我要体验",
                        "url" => "http://kdjx.sanchi.xin"
                    ],
                    [
                        "type" => "view",
                        "name" => "家庭教育",
                        "url" => "http://kdjx.sanchi.xin"
                    ],
                ],
            ],
        ];

        dd($menu->add($buttons));
    }

    public function test()
    {
        $notice = $this->app->notice;

        $userId = 'ouDOyw_S1t5qxUMZVQ3saX13P8LE';

        $templateId = 'AH2UxOHfvQV9YR1HPD80A6TgcYthl-wuKPOnKDweRMs';

        $url = 'http://kdjx.sanchi.xin';

        $data = [
            'first' => '您有一个新的任务',
            'keyword1' => '测试学校',
            'keyword2' => '张老师',
            'keyword3' => '放学按时写作业',
            'keyword4' => date('Y-m-d H:i:s',time()),
            'remark' => '请及时完成作业'
        ];

        $messageId = $notice->uses($templateId)->withUrl($url)->andData($data)->andReceiver($userId)->send();

        dd($messageId);
    }
}