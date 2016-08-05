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

            }
        }
    }
}
