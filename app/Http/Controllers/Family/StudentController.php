<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 19:38
 */

namespace App\Http\Controllers\Family;


use App\Models\Exam;
use App\Models\Order;
use App\Models\Score;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class StudentController extends FamilyController
{
    /**
     * 学生列表
     * @return mixed
     */
    public function index()
    {
        $students = $this->user->family->students;

        return view('family.student.index',[
            'students' => $students
        ]);
    }

    /**
     * 学生详情
     * @param Request $request
     * @param Student $student
     * @return mixed
     */
    public function detail(Request $request,Student $student,Exam $exam,Score $score)
    {
        $student = $student->findOrFail($request->id);

        $exam = $exam->where('classes_id',$student->classes->id)->orderBy('id','desc')->first();

        if(!$exam)
        {
            return view('family.student.detail',[
                'student' => $student,
                'status' => $this->hasStudentEndTime($student,$this->user)
            ]);
        }

        $firstScores = $exam->scores;

        $studentScore = [];

        $firstScoresTotal = 0;

        foreach ($firstScores as $score)
        {
            if(!isset($studentScore[$score->student_id]))
            {
                $studentScore[$score->student_id] = 0;
            }

            $studentScore[$score->student_id] += $score->val;

            if($student->id == $score->student_id)
            {
                $firstScoresTotal += $score->val;
            }
        }

        rsort($studentScore);

        $firstSort = 0;

        foreach ($studentScore as $key => $item)
        {
            if($item == $firstScoresTotal)
            {
                $firstSort = $key;
            }
        }

        $exams = $exam->where([

            'classes_id' => $student->classes->id

        ])->orderBy('id','asc')->get()->take(5);

        $totals = [];

        $total_name = [];

        $i = 0;

        foreach ($exams as $ite)
        {
            $total_name[$i] = $ite->name;

            $totals[$i] = $score->where([
                'exam_id' => $ite->id,
                'student_id' => $student->id
            ])->sum('val');

            $i++;
        }

        return view('family.student.detail',[
            'student' => $student,
            'firstScores' => $firstScores,
            'firstSort' => $firstSort,
            'firstTotal' => $firstScoresTotal,
            'totals' => $totals,
            'total_name' => $total_name,
            'status' => $this->hasStudentEndTime($student,$this->user)
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

    /**
     * 邀请绑定
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function invited()
    {
        return view('family.student.invited',[
            'students' => $this->user->family->students
        ]);
    }
}