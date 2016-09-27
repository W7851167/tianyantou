<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Mailer\Mailer;
use App\Models\UserModel;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailJob extends Job implements SelfHandling,ShouldQueue
{
    use InteractsWithQueue,SerializesModels
    public $queue = 'email';
    private $userModel;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(UserModel $userModel)
    {
        $this->userModel;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $mailer->sendTo($this->userModel,'天眼投用户密码重置','vendor.findpassword');
    }
}
