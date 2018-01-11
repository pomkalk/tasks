<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class JobProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $job = \App\HardJob::find($this->id);
        $job->message = "processing...";
        $job->save();
        while ($job->percent < 100) {
            sleep($job->wait);

            $job->percent += $job->step;
            if ($job->percent > 100)
                $job->percent = 100;

            $job->save();
        }
        $job->message = "Finished.";
        $job->save();
    }
}
