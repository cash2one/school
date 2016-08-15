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
use DB;
use Exception;
use App\Jobs\SendActivityNotice;

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
        return view('teacher.activity.add',[
            'courses' => $this->user->teacher->courses
        ]);
    }

    /**
     * 存储活动信息
     * @param Request $request
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request,Course $course)
    {
        $this->validate($request,[
            'name' => 'required',
            'detail' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'course_id' => 'array'
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

        DB::beginTransaction();

        try
        {
            foreach ($request->course_id as $item)
            {
                $course = new Course();

                $course = $course->where('id',$item)->first();

                $activity = Activity::create([
                    'name' => $request->name,
                    'user_id' => $this->user->id,
                    'classes_id' => $course->classes_id,
                    'grade_id' => $course->grade_id,
                    'school_id' => $course->school_id,
                    'teacher_id' => $course->teacher_id,
                    'start_at' => $start_time,
                    'end_at' => $end_time,
                    'detail' => $request->detail
                ]);

                $this->sendNotice($activity);
            }

            DB::commit();

            return redirect('/teacher')->with('status',[
                'code' => 'success',
                'msg'  => '成功'
            ]);
        }
        catch(Exception $e)
        {
            DB::rollBack();

            return redirect()->back()->with('status',[
                'code' => 'error',
                'msg'  => '失败'
            ]);
        }

    }

    /**
     * 发送通知
     * @param Activity $activity
     */
    private function sendNotice(Activity $activity)
    {
        $students = $activity->classes->students;

        foreach ($students as $student)
        {
            $job = (new SendActivityNotice($student,$this->user->teacher,$activity))->delay(5);

            $this->dispatch($job);
        }
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