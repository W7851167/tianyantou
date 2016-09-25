<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Queue\InteractsWithQueue;

class SendSmsJob extends Job implements SelfHandling
{
    private $queue = 'sms';

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
       app('queue')->connection('beanstalkd')->push($this->queue, $data);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $job = app('queue')->connection('beanstalkd')->pop($this->queue);
        error_log(var_export($job,true),3, "d:/beanstalk.log");
    }
}
