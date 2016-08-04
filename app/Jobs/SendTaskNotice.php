<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Task;
use App\Models\Student;
use App\Models\Teacher;
use EasyWeChat\Foundation\Application;

class SendTaskNotice extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $student;

    private $teacher;

    private $task;

    /**
     * 发送作业
     * SendTaskNotice constructor.
     * @param Student $student
     * @param Teacher $teacher
     * @param Task $task
     */
    public function __construct(Student $student,Teacher $teacher,Task $task)
    {
        $this->student = $student;

        $this->task = $task;

        $this->teacher = $teacher;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $parents = $this->student->parents;

        dd($parents);

        $app = new Application(config('wechat'));

        foreach ($parents as $item)
        {
            $notice = $app->notice;

            $userId = $item->user->openid;

            $templateId = 'n1bU1cnadeUL2BLcWvYwdS0e6wQr1AbYL_QD88WPQac';

            $url = 'http://kdjx.sanchi.xin/family/detail/detail/'.$this->task->id;

            $data = [
                'first' => $this->student->name.'有一个新的作业',
                'name' => $this->student->name,
                'subject' => $this->task->course->name,
                'content' => $this->task->detail,
                'remark' => "完成截止时间：".date('Y-m-d H:i:s',$this->task->completed_at)
            ];

            $notice->uses($templateId)->withUrl($url)->andData($data)->andReceiver($userId)->send();
        }
    }
}
