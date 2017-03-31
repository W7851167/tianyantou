<?php
/**
 * Created by PhpStorm.
 * User: pengzhizhuang
 * Date: 16/6/16
 * Time: 下午10:28
 */

namespace App\Mailer;


use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Session;

class ValidateMailer extends Mailer implements ShouldQueue
{
    use InteractsWithQueue;

    public function welcome($params)
    {
        $code = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        $subject = 'tianyantou';
        $view = 'tianyantou';
        $data = ['%name%' => [$params['username']], '%code%' => [$code], 'email' => $params['email']];
        Session::put('user_' . $params['id'], $code);
        $this->sendTo($subject, $view, $data);
    }

    /**
     * @param $params
     *
     * 发送邮箱找回密码
     */
    public function find($params)
    {
        $subject = 'tianyantou_find';
        $view = 'tianyantou_find';
        $data = ['%name%' => [$params['username']], '%url%' => [$params['url']], 'email' => $params['email']];
        $this->sendTo($subject, $view, $data);
    }
}