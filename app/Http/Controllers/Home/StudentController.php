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
use Toplan\Sms\SmsManager;

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
    public function getCode(Request $request,Student $student,SmsManager $manager)
    {
        $student = $student->where([
            'student_id' => $request->student_id,
            'family_mobile' => $request->family_mobile
        ])->first();

        if(!$student)
        {
            return response()->json([
                'code' => 'error',
                'msg' => '找不到学生'
            ]);
        }

        $res = $manager->requestVerifySms($student,60);

        if($res->success)
        {
            return response()->json([
                'code' => 'success',
                'msg' => '短信已成功发送'
            ]);
        }

        return response()->json([
            'code' => 'success',
            'msg' => '成功'
        ]);
    }
}