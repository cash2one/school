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

            switch($message->MsgType)
            {
                case 'event':
                    # 事件消息...
                    break;
                case 'text':
                    return '接收到文字消息';
                    break;
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
                    return 'null';
                    break;
            }
        });

        $response = $server->serve();

        return $response;
    }
}