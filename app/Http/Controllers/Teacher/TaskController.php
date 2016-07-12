<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/8
 * Time: 18:40
 */

namespace App\Http\Controllers\Teacher;


use App\Models\Course;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends TeacherController
{
    /**
     * 作业列表
     * @param Task $task
     * @return mixed
     */
    public function index(Task $task)
    {
        $tasks = $task->where('teacher_id',$this->user->id)->paginate(30);

        return view('teacher.task.index',[
            'tasks' => $tasks
        ]);
    }

    /**
     * 发布作业
     * @param Request $request
     * @param Course $course
     * @return mixed
     */
    public function add(Request $request,Course $course)
    {
        $course = $course->findOrFail($request->id);

        return view('teacher.task.add',[
            'course' => $course
        ]);
    }

    /**
     * 存储作业
     * @param Request $request
     * @param Course $course
     * @param Task $task
     * @return mixed
     */
    public function store(Request $request,Course $course,Task $task)
    {
        $this->validate($request,[
            'course_id' => 'required',
            'detail' => 'required'
        ]);

        $course = $course->findOrFail($request->course_id);

        $task->classes_id = $course->classes_id;

        $task->teacher_id = $this->user->id;

        $task->grade_id = $course->grade_id;

        $task->school_id = $course->school_id;

        $task->course_id = $course->id;

        $task->name = date('Y-m-d').$course->name.'作业';

        $task->detail = $request->detail;

        if($task->save())
        {
            return redirect('/teacher')->with('status',[
                'code' => 'success',
                'msg'  => '成功'
            ]);
        }

        return redirect()->back()->with('status',[
            'code' => 'error',
            'msg'  => '失败'
        ]);
    }

    /**
     * 作业详情
     * @param Request $request
     * @param Task $task
     * @return mixed
     */
    public function detail(Request $request,Task $task)
    {
        $task = $task->findOrFail($request->id);

        return view('teacher.task.detail',[
            'task' => $task
        ]);
    }
}