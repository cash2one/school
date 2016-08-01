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


    public function save(Request $request,Student $student,Order $order)
    {

    }
}