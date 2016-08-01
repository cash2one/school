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
use DB;
use Exception;
use App\Models\Pay;
use Log;

class PayController extends HomeController
{
    public function wechat(Request $request,Order $order)
    {
        $app = new Application(config('wechat'));

        $payment = $app->payment;

        $order = $order->findOrFail($request->id);

        $attributes = [
            'trade_type'       => 'JSAPI', // JSAPI，NATIVE，APP...
            'openid'           => $request->user()->openid,
            'body'             => $order->name,
            'detail'           => $order->name,
            'out_trade_no'     => $order->number,
            'total_fee'        => $order->total * 100
        ];

        $Worder = new Worder($attributes);

        $result = $payment->prepare($Worder);

        if ($result->return_code != 'SUCCESS' || $result->result_code != 'SUCCESS')
        {
            return response()->json([
                'code' => 'fail',
                'msg' => 'wechat order fail'
            ]);
        }

        $prepayId = $result->prepay_id;

        $json = $payment->configForPayment($prepayId);

        return view('home.pay.wechat',[
            'order' => $order,
            'json' => $json
        ]);
    }

    public function notify(Request $request,Order $order)
    {
        $app = new Application(config('wechat'));

        $response = $app->payment->handleNotify(function($notify, $successful){

            $order = new Order();

            $order = $order->where('number',$notify->transaction_id)->first();

            if(!$order)
            {
                return 'order fail';
            }

            if($order->status_id != 7)
            {
                return true;
            }

            if ($successful)
            {
                DB::beginTransaction();

                try
                {
                    $order->status_id = 1;
                    $order->save();
                    $pay = new Pay();

                    $pay->order_id = $order->id;
                    $pay->pay_type_id = 1;
                    $pay->user_id = $order->user_id;
                    $pay->transaction_id = $notify->transaction_id;
                    $pay->total = $notify->total_fee;
                    $pay->save();

                    $month = $notify->total_fee / 1000;

                    $endTime = 60*60*24*30*$month;

                    $ParentStudent = DB::table('parent_student')->where([
                        'parent_id' =>$order->user->family->id,
                        'student_id' => $order->student_id
                    ])->increment('end_time',$endTime);

                    DB::commit();

                    return true;
                }
                catch (Exception $e)
                {
                    DB::rollBack();

                    Log::error($e->getMessage());

                    return false;
                }

            }
            else
            {
                $order->status_id = 2;

                $order->save();
            }

            return true; // 或者错误消息
        });
        return $response;
    }

    public function status()
    {

    }
}