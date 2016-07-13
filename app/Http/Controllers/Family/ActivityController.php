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
use App\Jobs\CreateActivityScore;

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
        ])->paginate(20);

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

        return view('family.activity.detail',[
            'student' => $student,
            'activity' => $activity,
            'scores' => $scores
        ]);
    }

    public function score(Request $request,Student $student,Activity $activity)
    {

    }
}