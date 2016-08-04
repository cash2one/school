<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Activity;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Jobs\CreateActivityScore;
use Log;

class Kernel extends ConsoleKernel
{
    use DispatchesJobs;

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function(){

            Log::info('来水计划任务');

            $activity = new Activity();

            $activitys = $activity->where('start_at','<=',time())->where('end_at','>=',time())->get();

            $i = 1;

            foreach ($activitys as $activity)
            {
                $createdActivityScore = (new CreateActivityScore($activity))->delay($i);

                $this->dispatch($createdActivityScore);

                $i++;
            }

        })->dailyAt('15:50');
    }
}
