<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 15:22
 */

namespace App\Http\Controllers\Teacher;


use App\Models\Activity;
use App\Models\Course;
use Illuminate\Http\Request;

class ActivityController extends TeacherController
{
    /**
     * 活动列表
     * @param Activity $activity
     * @return mixed
     */
    public function index(Activity $activity)
    {
        $activitys = $this->user->activitys()->paginate(15);

        return view('teacher.activity.index',[
            'activitys' => $activitys
        ]);
    }

    /**
     * 发布活动
     * @param Request $request
     * @param Course $course
     * @return mixed
     */
    public function add(Request $request,Course $course)
    {
        $course = $course->findOrFail($request->id);

        return view('teacher.activity.add',[
            'course' => $course
        ]);
    }

    /**
     * 存储活动信息
     * @param Request $request
     * @param Course $course
     * @param Activity $activity
     * @return mixed
     */
    public function store(Request $request,Course $course,Activity $activity)
    {
        $course = $course->findOrFail($request->course_id);

        $this->validate($request,[
            'name' => 'required',
            'detail' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        $start_time = strtotime($request->start_time);

        $end_time = strtotime($request->end_time.' 23:59:59');

        if($end_time < $start_time)
        {
            return redirect()->back()->with('status',[
                'code' => 'error',
                'msg' => '时间段是错误的'
            ]);
        }

        $activity->name = $request->name;

        $activity->user_id = $this->user->id;

        $activity->classes_id = $course->classes_id;

        $activity->grade_id = $course->grade_id;

        $activity->school_id = $course->school_id;

        $activity->teacher_id = $course->teacher_id;

        $activity->detail = $request->detail;

        $activity->start_at = $start_time;

        $activity->end_at = $end_time;

        if($activity->save())
        {
            return redirect('/teacher/activity')->with('status',[
                'code' => 'success',
                'msg' => '发布成功'
            ]);
        }

        return redirect()->back()->with('status',[
            'code' => 'error',
            'msg' => '发布失败'
        ]);
    }
}