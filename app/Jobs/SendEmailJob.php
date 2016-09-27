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
    private $template;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($template,UserModel $userModel)
    {
        $this->template = $template;
        $this->userModel = $userModel;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        if($this->template == 'tianyantou') {
            $subject = '天眼投用户注册验证';
            $code = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
            $data = ['%name%'=>$this->userModel->name, '%code%'=>$code];
        }

        if($this->template == 'tianyantou_find') {
            $subject =  '天眼投用户密码重置';
            $url =  config('app.account_url').'/findpassword/resetpasswordemail/' .
                authcode($this->userModel->id,'ENCODE') .'.html';
            $data = ['%name%'=>$this->userModel->name, '%url%'=>$url];
        }

        $mailer->sendTo($this->userModel,$subject,$this->template, $data);
    }
}
