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
use App\Library\Traits\SmsTrait;
use App\Repositories\CensusRepository;

class TestController extends  FrontController
{
    use SmsTrait;
    public function __construct(CensusRepository $census)
    {
        $this->census = $census;
    }

    public function index()
    {
        $config =[
            'rate' => 4.2,         //利率
            'rate_unit' => 0,      //0年利率 1、日利率 2、年利率（按360天计算）
            'money' => 200000,       //投资金额
            'term' => 258,           //投资期限
            'term_unit' => 1,     //投资期限单位 0 月 1日
            'repay_type' => 5,    //还款方式，具体属性repayType
            'manage_fee' => 1, //管理费率
            'reward' => 200,     //奖励
            'discount' => 100,   //折扣奖励
            'start_time' => '2016-09-24',    //起息日期;
        ];
        $obj = app()->make('LibraryManager')->create('income');
        $result = $obj->_init($config)->getList();
        dd($result);
    }

}