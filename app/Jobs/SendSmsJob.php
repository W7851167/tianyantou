<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSmsJob extends Job implements SelfHandling,ShouldQueue
{
    use InteractsWithQueue,Queueable;
    public  $queue = 'sms';
    private  $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
    }
}
