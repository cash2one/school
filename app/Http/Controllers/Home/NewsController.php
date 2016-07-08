<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/8
 * Time: 15:55
 */

namespace App\Http\Controllers\Home;


class NewsController extends HomeController
{

    /**
     * 新增新闻内容
     * @return mixed
     */
    public function add()
    {
        $teacher = $this->user->teacher;

        return view('home.news.add',[
            'teacher' => $teacher
        ]);
    }
}