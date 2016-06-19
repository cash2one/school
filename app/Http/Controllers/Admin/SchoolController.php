<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/6/13
 * Time: 16:31
 */

namespace App\Http\Controllers\Admin;


class SchoolController extends AdminController
{
    public function index()
    {
        return view('admin.school.index');
    }
}