<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/8
 * Time: 19:10
 */

namespace App\Http\Controllers\Teacher;


class ClassesController extends TeacherController
{
    /**
     * 教师任课班级列表
     * @return mixed
     */
    public function index()
    {
        $teacher = $this->user->teacher;

        return view('teacher.classes.index',[
            'courses' => $teacher->courses
        ]);
    }
}