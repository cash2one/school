<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/8
 * Time: 14:28
 */

namespace App\Http\Controllers\Home;


class TeacherController extends HomeController
{
    public function index()
    {
        $teacher = $this->user->teacher;

        return view('home.teacher.index',[
            'teacher' => $teacher
        ]);
    }

    /**
     * 绑定教师界面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bind()
    {
        return view('home.teacher.bind');
    }
}