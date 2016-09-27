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


use App\Http\Controllers\FrontController;
use App\Jobs\SendSmsJob;
use App\Library\Traits\SmsTrait;
use App\Repositories\CensusRepository;
use Illuminate\Support\Facades\Queue;

class TestController extends  FrontController
{
    use SmsTrait;
    public function __construct(CensusRepository $census)
    {
        $this->census = $census;
    }

    public function index()
    {
        $this->sendSms(['15072309522']);
//        return $this->dispatch(new SendSmsJob(['message'=>'content']));
    }

}