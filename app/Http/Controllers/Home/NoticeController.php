<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/8/10
 * Time: 15:14
 */

namespace App\Http\Controllers\Home;
use DB;

class NoticeController extends HomeController
{
    /**
     * 提醒
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function student()
    {
        return view('home.notice.student',[
            'students' => $this->user->family->students
        ]);
    }
}