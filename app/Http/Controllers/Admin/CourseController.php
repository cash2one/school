<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/5
 * Time: 16:55
 */

namespace App\Http\Controllers\Admin;


use App\Models\Classes;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseController extends AdminController
{
    /**
     * 新增课程
     * @param Request $request
     * @param Classes $classes
     * @param Teacher $teacher
     * @return mixed
     */
    public function add(Request $request,Classes $classes,Teacher $teacher)
    {
        $classes = $classes->findOrFail($request->id);

        return view('admin.course.add',[
            'classes' => $classes
        ]);
    }

    /**
     * 班级课程列表
     * @param Request $request
     * @param Classes $classes
     * @return mixed
     */
    public function classes(Request $request,Classes $classes)
    {
        $classes = $classes->findOrFail($request->id);

        $courses = $classes->courses()->paginate(20);

        return view('admin.course.index',[
            'courses' => $courses,
            'classes' => $classes
        ]);
    }

    public function edit(Request $request,Classes $classes,Course $course)
    {
        $course = $course->findOrFail($request->id);

        $classes = $classes->findOrFail($request->id);

        return view('admin.course.edit',[
            'course' => $course,
            'classes' => $classes
        ]);
    }

    /**
     * 存储课程信息
     * @param Request $request
     * @param Classes $classes
     * @param Course $course
     * @return mixed
     */
    public function store(Request $request,Classes $classes,Course $course)
    {
        $classes = $classes->findOrFail($request->classes_id);

        if($request->id)
        {
            $course = $course->findOrFail($request->id);
        }

        $course->name = $request->name;

        $course->school_id = $classes->school_id;

        $course->classes_id = $classes->id;

        $course->grade_id = $classes->grade->id;

        $course->teacher_id = $request->teacher_id;

        if($course->save())
        {
            return redirect()->back()->with('status',[
                'code' => 'success',
                'msg'  => '保存成功'
            ]);
        }

        return redirect()->back()->with('status',[
            'code' => 'error',
            'msg'  => '保存失败'
        ]);
    }
}