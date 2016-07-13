<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 16:27
 */

namespace App\Http\Controllers\Family;


class IndexController extends FamilyController
{
    public function index()
    {
        $students = $this->user->family->students;

        return view('family.welcome',[
            'user' => $this->user,
            'students' => $students
        ]);
    }
}