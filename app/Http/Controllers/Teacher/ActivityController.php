<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 15:22
 */

namespace App\Http\Controllers\Teacher;


use App\Models\Activity;
use App\Models\ActivityScore;
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
        $activitys = $activity->where('teacher_id',$this->user->teacher->id)->orderBy('id','desc')->paginate(15);

        return view('teacher.activity.index',[
            'activitys' => $activitys
        ]);
    }

    /**
     * 发布活动
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        var_dump(123);
        return view('teacher.activity.add',[
            'courses' => $this->user->teacher->courses
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

    /**
     * 活动详情
     * @param Request $request
     * @param Activity $activity
     * @return mixed
     */
    public function detail(Request $request,Activity $activity)
    {
        $activity = $activity->findOrFail($request->id);

        $scores = $activity->scores()->orderBy('id','desc')->get();

        return view('teacher.activity.detail',[
            'activity' => $activity,
            'scores' => $scores
        ]);
    }

    /**
     * 活动评分详情
     * @param Request $request
     * @param Activity $activity
     * @param ActivityScore $score
     * @return mixed
     */
    public function score(Request $request,Activity $activity,ActivityScore $score)
    {
        $activity = $activity->findOrFail($request->id);

        $scores = $score->where([
            'activity_id' => $activity->id,
            'score' => $request->score
        ])->paginate(20);

        return view('teacher.activity.detail',[
            'activity' => $activity,
            'scores' => $scores
        ]);
    }
}