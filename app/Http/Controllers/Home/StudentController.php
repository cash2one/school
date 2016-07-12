<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/8
 * Time: 14:19
 */

namespace App\Http\Controllers\Home;


use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends HomeController
{
    public function index()
    {

    }

    public function bind()
    {
        return view('home.student.bind');
    }

    /**
     * 获取验证码
     * @param Request $request
     * @param Student $student
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCode(Request $request,Student $student)
    {
        return response()->json([
            'code' => 'success',
            'msg' => '成功'
        ]);
    }
}