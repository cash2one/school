<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 19:39
 */

namespace App\Http\Controllers\Family;


use App\Models\Activity;
use App\Models\ActivityScore;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Jobs\SendActivityNotice;

class ActivityController extends FamilyController
{
    /**
     * 学生的活动
     * @param Request $request
     * @param Student $student
     * @param Activity $activity
     * @return mixed
     */
    public function student(Request $request,Student $student,Activity $activity)
    {
        $student = $student->findOrFail($request->id);

        $activitys = $activity->where([
            'classes_id' => $student->class_id
        ])->orderBy('id','desc')->paginate(20);

        return view('family.activity.index',[
            'student' => $student,
            'activitys' => $activitys
        ]);
    }


    /**
     * 活动详情
     * @param Request $request
     * @param Student $student
     * @param Activity $activity
     * @return mixed
     */
    public function detail(Request $request,Student $student,Activity $activity,ActivityScore $activityScore)
    {
        $student = $student->findOrFail($request->sid);

        $activity = $activity->findOrFail($request->id);

        $scores = $activity->scores()->where('student_id',$student->id)->get();

        $job = new SendActivityNotice($student,$activity->teacher,$activity);

        $this->dispatch($job);

        return view('family.activity.detail',[
            'student' => $student,
            'activity' => $activity,
            'scores' => $scores
        ]);
    }

    /**
     * 评分
     * @param Request $request
     * @param Student $student
     * @param Activity $activity
     * @param ActivityScore $activityScore
     * @return \Illuminate\Http\JsonResponse
     */
    public function score(Request $request,Student $student,Activity $activity,ActivityScore $activityScore)
    {
        $student = $student->findOrFail($request->student_id);

        $activity = $activity->findOrFail($request->activity_id);

        $activityScore = $activityScore->where([
            'student_id' => $student->id,
            'activity_id' => $activity->id
        ])->first();

        $activityScore->score = $request->score;

        if($activityScore->save())
        {
            return response()->json([
                'code' => 'success',
                'msg'  => '评分成功'
            ]);
        }

        return response()->json([
            'code' => 'error',
            'msg'  => '评分失败'
        ]);
    }
}