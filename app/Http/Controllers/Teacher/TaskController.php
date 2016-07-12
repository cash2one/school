<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/8
 * Time: 18:40
 */

namespace App\Http\Controllers\Teacher;


use App\Models\Course;
use Illuminate\Http\Request;

class TaskController extends TeacherController
{
    /**
     * 发布作业
     * @param Request $request
     * @param Course $course
     * @return mixed
     */
    public function add(Request $request,Course $course)
    {
        $course = $course->findOrFail($request->id);

        return view('teacher.task.add',[
            'course' => $course
        ]);
    }
}