<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 19:40
 */

namespace App\Http\Controllers\Family;


use App\Models\Exam;
use App\Models\Student;
use Illuminate\Http\Request;

class ExamController extends FamilyController
{
    /**
     * 学生考试
     * @param Request $request
     * @param Student $student
     * @param Exam $exam
     * @return mixed
     */
    public function student(Request $request,Student $student,Exam $exam)
    {
        $student = $student->findOrFail($request->id);

        $exams = $exam->where([
            'classes_id' => $student->class_id
        ])->paginate(20);

        return view('family.exam.index',[
            'student' => $student,
            'exams'   => $exams
        ]);
    }

    /**
     * 成绩单
     * @param Exam $exam
     * @param Request $request
     * @param Student $student
     * @return mixed
     */
    public function detail(Exam $exam,Request $request,Student $student)
    {
        $student = $student->findOrFail($request->sid);

        $exam = $exam->where([
            'id'    => $request->id
        ])->first();

        $scores = $exam->scores->where('student_id',$student->id)->get();

        return view('family.exam.detail',[
            'student' => $student,
            'exam' => $exam,
            'scores' => $scores
        ]);
    }
}