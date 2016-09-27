<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Mailer\Mailer;
use App\Models\UserModel;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailJob extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    public $queue = 'email';
    private $params;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->params = $params;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        if (isset($params['type']) && $params['type'] == 'find') {
            $subject = 'tianyantou_find';
            $view = 'tianyantou_find';
            $data = ['%name%' => [$params['username']], '%url%' => [$params['url']], 'email' => $params['email']];
            $mailer->sendTo($subject, $view, $data);
        } else {
            $code = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
            $subject = 'tianyantou';
            $view = 'tianyantou';
            $data = ['%name%' => [$params['username']], '%code%' => [$code], 'email' => $params['email']];
            Session::put('user_' . $params['id'], $code);
        }
        $mailer->sendTo($subject, $view, $data);
    }
}
