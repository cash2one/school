<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/8
 * Time: 14:19
 */

namespace App\Http\Controllers\Home;


class StudentController extends HomeController
{
    public function index()
    {

    }

    public function bind()
    {
        return view('home.student.bind');
    }
}