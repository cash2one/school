<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Models\Activity;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use EasyWeChat\Foundation\Application;

class SendActivityNotice extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $student;

    private $teacher;

    private $activity;

    /**
     * 发送任务
     * SendActivityNotice constructor.
     * @param Student $student
     * @param Teacher $teacher
     * @param Activity $activity
     */
    public function __construct(Student $student,Teacher $teacher,Activity $activity)
    {
        $this->student = $student;

        $this->activity = $activity;

        $this->teacher = $teacher;
    }

    /**
     * 运行任务
     */
    public function handle()
    {
        $parents = $this->student->parents();

        $app = new Application(config('wechat'));

        foreach ($parents as $item)
        {
            var_dump($item);
            $notice = $app->notice;

            $userId = $item->user->openid;

            $templateId = 'AH2UxOHfvQV9YR1HPD80A6TgcYthl-wuKPOnKDweRMs';

            $url = url('/family/activity/detail',['id' => $this->activity->id,'sid' => $this->student->id]);

            $data = [
                'first' => $this->student->name.'有一个新的任务',
                'keyword1' => $this->student->school->name,
                'keyword2' => $this->teacher->name,
                'keyword3' => $this->activity->name,
                'keyword4' => date('Y-m-d H:i:s',time()),
                'remark' => $this->activity->detail
            ];

            $notice->uses($templateId)->withUrl($url)->andData($data)->andReceiver($userId)->send();
        }
    }
}
