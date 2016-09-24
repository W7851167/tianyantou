<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 收益代码设置
 *-------------------------------------------------------------------------------
 * $FILE:IncomeProxy.php
 * $Author:zxs
 * $Dtime:2016/9/24
 ***********************************************************************************/
namespace App\Library\Utils;

use App\Library\Utils\Repay\RepayException;

class IncomeProxy {
    //还款方式
    private $repayType = [
        1 => '一次性还本付息',
        2 => '按月付息到期还本',
        3 => '按日付息到期还本',
        4 => '等额本金',
        5 => '等额本息',
        6 => '月还息按季等额本金',
        7 => '按季付息到期还本'
    ];
    //配置文件
    private $config =[
      'rate' => 0.00,         //利率
      'rate_unit' => 0,      //0年利率 1、日利率 2、年利率（按360天计算）
      'money' => 0.00,       //投资金额
      'term' => 0,           //投资期限
      'term_unit' => 0,     //投资期限单位 0 月 1日
      'repay_type' => 0,    //还款方式，具体属性repayType
      'manage_fee' => 0.00, //管理费率
      'reward' => 0.00,     //奖励
      'discount' => 0.00,   //折扣奖励
      'start_time' => 0,    //起息日期;
    ];

    private $obj;

    /**
     * IncomeProxy constructor.
     * @param array $config
     * configu信息传递数据
     */
    public function _init($config = [])
    {
        $this->setConfig($config);
        /* 判断调用库的类型 */
        switch ($this->config['repay_type']) {
            case 1:
                $class = 'Once';
                break;
            case 2:
                $class = 'Month';
                break;
            case 3:
                $class = 'Day';
                break;
            default:
                throw new RepayException('还款方式异常');
        }

        //引入处理库
        $class  =    "App\\Library\\Utils\\Repay\\{$class}";
        $this->obj = new $class();
        return $this;
    }



    /**
     * @param $config
     * @throws \Exception
     * 设置配置文件
     */
    private function setConfig($config)
    {
       foreach($this->config as $k=>$v)
       {
           if(!isset($config[$k]))
               throw new RepayException('参数传递错误');
           $this->config[$k] = $config[$k];
       }
    }

    /**
     * 获取统计信息
     */
    public function getIncomeStats()
    {
        return $this->obj->getIncomeStats($this->config);
    }

    /**
     * 获取矩阵信息
     */
    public function getIncomeList()
    {
        return $this->obj->getIncomeList($this->config);
    }


}