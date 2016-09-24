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
use App\Repositories\CensusRepository;

class TestController extends  FrontController
{
    public function __construct(CensusRepository $census)
    {
        $this->census = $census;
    }

    public function index()
    {
        $config =[
            'rate' => 12,         //利率
            'rate_unit' => 1,      //0年利率 1、日利率 2、年利率（按360天计算）
            'money' => 10000,       //投资金额
            'term' => 6,           //投资期限
            'term_unit' => 0,     //投资期限单位 0 月 1日
            'repay_type' => 1,    //还款方式，具体属性repayType
            'manage_fee' => 1, //管理费率
            'reward' => 200,     //奖励
            'discount' => 100,   //折扣奖励
            'start_time' => '2016-09-24',    //起息日期;
        ];
        $obj = app()->make('LibraryManager')->create('IncomeProxy');
        $result = $obj->_init($config)->getIncomeList();
        echo date('Y-m-d', $result['repay_time']);
        dd($result);
    }

}