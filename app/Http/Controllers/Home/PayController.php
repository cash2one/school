<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/8/1
 * Time: 11:17
 */

namespace App\Http\Controllers\Home;
use App\Models\Order;
use Illuminate\Http\Request;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order as Worder;

class PayController extends HomeController
{
    public function wechat(Request $request,Order $order)
    {
        $app = new Application(config('wechat'));

        $payment = $app->payment;

        $order = $order->findOrFail($request->id);

        $attributes = [
            'trade_type'       => 'JSAPI', // JSAPI，NATIVE，APP...
            'body'             => $order->name,
            'detail'           => $order->name,
            'out_trade_no'     => $order->number,
            'total_fee'        => $order->total * 100,
        ];

        $Worder = new Worder($attributes);

        $result = $payment->prepare($Worder);

        if ($result->return_code != 'SUCCESS' || $result->result_code != 'SUCCESS')
        {
            dd($result);
        }

        $prepayId = $result->prepay_id;

        $json = $payment->configForPayment($prepayId);

        return view('home.pay.wechat',[
            'order' => $order,
            'json' => $json
        ]);
    }
}