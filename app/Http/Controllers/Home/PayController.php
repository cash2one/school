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

class PayController extends HomeController
{
    public function wechat(Request $request,Order $order)
    {
        $order = $order->findOrFail($request->id);

        return view('home.pay.wehchat',[
            'order' => $order
        ]);
    }
}