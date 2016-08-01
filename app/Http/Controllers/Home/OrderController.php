<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/8/1
 * Time: 10:43
 */

namespace App\Http\Controllers\Home;


use App\Models\Order;
use App\Models\Student;
use Illuminate\Http\Request;

class OrderController extends HomeController
{
    /**
     * 购买页面
     * @param Request $request
     * @param Student $student
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function buy(Request $request,Student $student)
    {
        $student = $student->findOrFail($request->id);

        return view('home.order.buy',[
            'student' => $student
        ]);
    }


    /**
     * 创建订单
     * @param Request $request
     * @param Student $student
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(Request $request,Student $student,Order $order)
    {
        $student = $student->findOrFail($request->id);

        $order->user_id = $this->user->id;

        $order->student_id = $student->id;

        $order->class_id = $student->class_id;

        $order->grade_id = $student->grade_id;

        $order->school_id = $student->school_id;

        $order->order_type_id = 1;

        $order->status_id = 7;

        $order->name = $student->name.'付费';

        $order->number = $this->createOrderNumber();

        $order->total = $request->total;

        $order->save();

        return redirect('/pay/wechat/'.$order->id);
    }

    /**
     * 创建订单编号
     * @return string
     */
    public function createOrderNumber()
    {
        return 'WX'.date('YmdHis',time()).time().rand(1000,9999);
    }
}