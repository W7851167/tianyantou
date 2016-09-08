<?php
/*********************************************************************************
 *  扩展类型-注册邮件处理
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 注册邮件处理
 *-------------------------------------------------------------------------------
 * $Author:zhuxishun
 * $Dtime:2016-04-17
 */

namespace  App\Library\Utils;

use App\Library\Traits\MailerTrait;
use Illuminate\Support\Facades\Session;

class Mailer {
    public  $signature = 'register';
    public  $template = 'vendor.mail.register';
    use MailerTrait;

    public function __construct($signature =null, $template=null)
    {
        isset($signature) && $this->signature = $signature;
        isset($template) && $this->template = $template;
    }


    /**
     * @param $email
     * @return mixed
     *
     * 发送邮件
     */
    public function send($email) {
        $name = "send"  . ucfirst($this->signature);
        return $this->$name($email);
    }


    private function sendRegister($email) {
        $code = range('a','z');
        shuffle($code);
        $code = implode('',array_slice($code,0,5));
        $manager = app()->make('LibraryManager');
        $cookie = $manager->create('cookie');
        $cookie->set('user_code', $code, 120);
        $subject = $code . '(验证码，1分钟内有效)';
        $data['code'] = $subject;
        return $this->sendTo($email, $subject, $this->template, $data);
    }

}