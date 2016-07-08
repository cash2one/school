<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/8
 * Time: 19:33
 */

namespace App\Http\Controllers\Teacher;


use App\Models\Course;
use App\Models\Exam;
use Illuminate\Http\Request;

class CourseController extends TeacherController
{
    /**
     * 单科详细信息
     * @param Request $request
     * @param Course $course
     * @param Exam $exam
     * @return mixed
     */
    public function detail(Request $request,Course $course,Exam $exam)
    {
        $course = $course->findOrFail($request->id);

        $exam = $exam->where('classes_id',$course->classes->id)->orderBy('created_at','desc')->first();

        $scores = $exam->scores()->where([
            'course_id' => $course->id
        ])->get();

        return view('teacher.course.detail',[
            'course' => $course,
            'scores' => $scores
        ]);
    }
}