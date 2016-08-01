<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/8/1
 * Time: 11:17
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order as Worder;
use DB;
use Exception;
use App\Models\Pay;
use Log;
use Illuminate\Routing\Controller as BaseController;

class PayController extends BaseController
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

    public function notify(Request $request,Order $order,Pay $pay)
    {
        $app = new Application(config('wechat'));

        $response = $app->payment->handleNotify(function($notify, $successful)use($order,$pay){

            $order = $order->where('number',$notify->out_trade_no)->first();

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

                    $pay->order_id = $order->id;
                    $pay->pay_type_id = 1;
                    $pay->user_id = $order->user_id;
                    $pay->transaction_id = $notify->transaction_id;
                    $pay->total = $notify->total_fee;
                    $pay->save();

                    $month = 3;//$notify->total_fee / 1000;
                    $endTime = 60*60*24*30*$month;
                    $endTime = time() + $endTime;

                    DB::table('parent_student')->where([
                        'parent_id' =>$order->user->family->id,
                        'student_id' => $order->student_id
                    ])->update([
                        'end_time' => $endTime
                    ]);

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

    /**
     * 订单状态
     * @param Request $request
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function status(Request $request,Order $order)
    {
        $app = new Application(config('wechat'));

        $order = $order->findOrFail($request->id);

        $status = $app->payment->query($order->number);

        dd($status->return_code);

        return view('home.pay.status',[
            'status' => $status
        ]);
    }
}