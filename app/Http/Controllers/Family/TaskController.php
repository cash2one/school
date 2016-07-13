<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 19:39
 */

namespace App\Http\Controllers\Family;


use App\Models\Student;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends FamilyController
{
    /**
     * 学生所在班级的作业
     * @param Request $request
     * @param Task $task
     * @return mixed
     */
    public function student(Request $request,Task $task,Student $student)
    {
        $student = $student->findOrFail($request->id);

        $tasks = $task->where([
            'classes_id' => $student->class_id
        ])->orderBy('id','desc')->paginate(10);

        return view('family.task.index',[
            'tasks' => $tasks,
            'student' => $student
        ]);
    }
}