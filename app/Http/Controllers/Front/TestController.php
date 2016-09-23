<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:TestController.php
 * $Author:zxs
 * $Dtime:2016/9/23
 ***********************************************************************************/

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Library\Traits\SmsTrait;

class TestController extends  Controller
{
    use SmsTrait;
    public function index()
    {
        $result = $this->sendSms([18611570121],'您的验证码121【华信】');
        dd($result);
    }

}