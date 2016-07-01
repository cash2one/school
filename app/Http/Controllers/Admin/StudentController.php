<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/6/30
 * Time: 22:43
 */

namespace App\Http\Controllers\Admin;


use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends AdminController
{
    public function index()
    {

    }

    /**
     * 新增学生
     * @param Request $request
     * @param Classes $classes
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Request $request,Classes $classes)
    {
        $classes = $classes->findOrFail($request->id);

        return view('admin.student.add');
    }

    public function store(Request $request,Student $student,Classes $classes)
    {
        if($request->id)
        {
            $student = $student->findOrFail($request->id);
        }

        $student->name = $request->name;

        //$student->
    }
}