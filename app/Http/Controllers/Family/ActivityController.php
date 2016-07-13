<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 19:39
 */

namespace App\Http\Controllers\Family;


use App\Models\Activity;
use App\Models\Student;
use Illuminate\Http\Request;

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

        $activitys = $activity->where()->paginate(20);

        return view('family.activity.index',[
            'student' => $student,
            'activitys' => $activitys
        ]);
    }
}