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
use App\Jobs\SendTaskNotice;
use DB;
use Exception;
use EasyWeChat\Foundation\Application;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class TaskController extends TeacherController
{
    /**
     * 作业列表
     * @param Task $task
     * @return mixed
     */
    public function index(Task $task)
    {
        $tasks = $task->where('teacher_id',$this->user->id)->orderBy('id','desc')->paginate(30);

        return view('teacher.task.index',[
            'tasks' => $tasks
        ]);
    }

    /**
     * 发布作业
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('teacher.task.add',[
            'courses' => $this->user->teacher->courses
        ]);
    }

    /**
     * 存储作业
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'course_id' => 'required',
            'detail' => 'required'
        ]);

        DB::beginTransaction();

        try
        {
            $app = new Application(config('wechat'));

            $temporary = $app->material_temporary;

            foreach ($request->course_id as $item) {
                $course = new Course();

                $course = $course->where('id', $item)->first();

                $task = Task::create([
                    'classes_id' => $course->classes_id,
                    'teacher_id' => $this->user->id,
                    'grade_id' => $course->grade_id,
                    'school_id' => $course->school_id,
                    'course_id' => $item,
                    'name' => $course->name,
                    'detail' => $request->detail,
                ]);


                /**
                 * 判断是否已经传图
                 */
                if (count($request->images) > 0)
                {
                    foreach ($request->images as $image) {
                        $savePath = "./uploads/tasks/";

                        $saveName = $image . '.jpg';

                        $temporary->download($image, $savePath,$image);

                        DB::table('task_image')->insert([
                            'task_id' => $task->id,
                            'local_url' => substr($savePath . $saveName, 1),
                            'origin_url' => $image,
                            'created_at' => time(),
                            'updated_at' => time(),
                        ]);
                    }
                }

                $this->sendNotic($task);
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

            dd($e);

            return redirect()->back()->with('status',[
                'code' => 'error',
                'msg'  => '失败'
            ]);
        }
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

    /**
     * 发送通知
     * @param Task $task
     */
    private function sendNotic(Task $task)
    {
        $classes = $task->classes;

        foreach ($classes->students as $key => $student)
        {
            $job = (new SendTaskNotice($student,$this->user->teacher,$task))->delay(5);

            $this->dispatchNow($job);
        }
    }
}