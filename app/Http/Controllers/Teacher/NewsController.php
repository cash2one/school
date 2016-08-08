<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/8/8
 * Time: 11:25
 */

namespace App\Http\Controllers\Teacher;


class NewsController extends TeacherController
{
    public function add()
    {
        return view('teacher.news.add',[
            'courses' => $this->user->teacher->courses
        ]);
    }
}