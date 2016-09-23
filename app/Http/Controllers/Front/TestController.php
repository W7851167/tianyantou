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
use App\Repositories\CensusRepository;

class TestController extends  Controller
{
    public function __construct(CensusRepository $census)
    {
        $this->census = $census;
    }

    public function index()
    {
        $stats = $this->census->getHalfYearStat(1);
        ksort($stats);
        dd($stats);
    }

}