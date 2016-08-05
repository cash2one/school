<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Models\Activity;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use EasyWeChat\Foundation\Application;

class SendActivityTodayNotic extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $activity;

    public function __construct(Activity $activity)
    {
        $this->activity = $activity;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $students = $this->activity->classes->students;

        $app = new Application(config('wechat'));

        foreach ($students as $student)
        {
            foreach ($student->parents as $item)
            {
                $notice = $app->notice;

                $userId = $item->user->openid;

                $templateId = 'nGehn5j_W4RlEPKBlZZVu8-Fn24MR6ahUiiccPQXGB8';

                $url = url('/family/activity/detail',['id' => $this->activity->id,'sid' => $item->id]);

                $data = [
                    'first' => $student->name.'的学习任务需要您评价',
                    'keyword1' => $this->activity->name,
                    'keyword2' => date('Y-m-d H:i:s'),
                    'keyword3' => '等待评价',
                    'remark' => '请在当日24点前完成评价！'
                ];

                $notice = $notice->uses($templateId)->withUrl($url)->andData($data)->andReceiver($userId)->send();
            }
        }
    }
}
