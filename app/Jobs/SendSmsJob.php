<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Library\Traits\SmsTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSmsJob extends Job implements SelfHandling,ShouldQueue
{
    use InteractsWithQueue,Queueable,SmsTrait;
    public $queue = 'sms';
    private  $mobile,$content;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mobile, $content)
    {
        $this->mobile = $mobile;
        $this->content = $content;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->sendSms([$this->mobile], $this->content);
    }
}
