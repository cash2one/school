<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Models\Activity;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;

class CreateActivityScore extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $activity;

    private $classes;

    /**
     * 创建队列
     * CreateActivityScore constructor.
     * @param Activity $activity
     */
    public function __construct(Activity $activity)
    {
        $this->activity = $activity;

        $this->classes = $activity->classes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $students = $this->activity->id;

        dd($students);

        foreach ($students as $student)
        {
            DB::table('activity_score')->insert([

                'activity_id' => $this->activity->id,
                'student_id'  => $student->id,
                'period'      => date('Ymd',time()),
                'score'       => 0,
                'created_at'  => time(),
                'updated_at'  => time()

            ]);
        }
    }
}
