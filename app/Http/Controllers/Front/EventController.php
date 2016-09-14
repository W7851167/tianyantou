<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:BroadcastController.php
 * $Author:zxs
 * $Dtime:2016/9/14
 ***********************************************************************************/

namespace App\Http\Controllers\Front;


use App\Events\PusherEvent;
use App\Http\Controllers\FrontController;

class EventController extends  FrontController
{
    public function index()
    {
        event(new PusherEvent('Great Wall is great ', '1'));
        return 'This is a Laravel Broadcaster Test!';
    }

}