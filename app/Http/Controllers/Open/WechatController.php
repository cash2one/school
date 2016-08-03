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

    private $server;

    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->app = new Application(config('wechat'));

        $this->server = $this->app->server;
    }

    /**
     * API分发回应微信服务端
     */
    public function index()
    {
        $this->server->setMessageHandler(function($message){

            return '欢迎关注';

        });

        $response = $this->server->serve();

        return $response;
    }
}