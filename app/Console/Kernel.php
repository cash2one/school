<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Activity;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Jobs\CreateActivityScore;
use Log;
use App\Jobs\SendActivityTodayNotic;

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

            $activity = new Activity();

            $activities = $activity->where('start_at','<=',time())->where('end_at','>=',time())->get();

            $i = 1;

            foreach ($activities as $activity)
            {
                $createdActivityScore = (new CreateActivityScore($activity))->delay($i);

                $this->dispatch($createdActivityScore);

                $sendActivityNotic = (new SendActivityTodayNotic($activity))->delay($i);

                $this->dispatch($sendActivityNotic);

                $i++;
            }

        })->dailyAt('14:55');
    }
}
