<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 16:27
 */

namespace App\Http\Controllers\Family;

use App\Models\Student;
use App\Models\User;
use DB;

class IndexController extends FamilyController
{
    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $students = $this->user->family->students;

        if(count($students) == 1)
        {
            $status = $this->hasStudentEndTime($students[0],$this->user);

            return view('family.welcome1',[
                'user' => $this->user,
                'student' => $students[0],
                'status' => $status
            ]);
        }

        return view('family.welcome',[
            'user' => $this->user,
            'students' => $students
        ]);
    }

    /**
     * 判断是否可以使用该服务
     * @param Student $student
     * @param User $user
     * @return array
     */
    private function hasStudentEndTime(Student $student,User $user)
    {
        $ParentStudent = DB::table('parent_student')->where([
            'student_id' => $student->id,
            'parent_id' => $user->family->id
        ])->first();

        if($ParentStudent->end_time == 0)
        {
            return [
                'code' => 'fail',
                'msg' => '您暂时还未付费'
            ];
        }

        if($ParentStudent->end_time < time())
        {
            return [
                'code' => 'fail',
                'msg' => '您的服务已经到期，请及时续费！'
            ];
        }

        return [
            'code' => 'success',
            'msg' => '服务正常'
        ];
    }
}