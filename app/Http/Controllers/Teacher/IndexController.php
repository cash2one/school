<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/8
 * Time: 19:01
 */

namespace App\Http\Controllers\Teacher;


class IndexController extends TeacherController
{
    public function index()
    {
        $teacher = $this->user->teacher;

        return view('teacher.welcome',[
            'teacher' => $teacher
        ]);
    }
}