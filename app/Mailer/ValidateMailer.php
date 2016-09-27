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
    public function welcome($user)
    {
        $code = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        $subject = 'tianyantou';
        $view = 'tianyantou';
        $data = ['%name%' => [$user->username], '%code%' => [$code]];
        Session::put('user_' . $user->id, $code);
        $this->sendTo($user, $subject, $view, $data);
    }
}