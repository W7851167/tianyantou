<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 等额本金
 *-------------------------------------------------------------------------------
 * $FILE:Capital.php
 * $Author:zxs
 * $Dtime:2016/9/24
 ***********************************************************************************/

namespace App\Library\Utils\Repay;


class Capital extends Repay
{
    /**
     * @param $data
     * 获取统计数据
     */
    public function  getStats($data)
    {
        $stat['income'] = 0;
        $stat['interest'] = 0;
        $stat['reward'] = $data['reward'] + $data['discount'];
        $stat['rate'] = 0;
        $money = $data['money'] + $data['reward'] + $data['discount'];
        $days = 0;
        $income = 0;
        $interest = 0;
        $lists = $this->getList($data);
         foreach($lists as $i=>$k)
         {
             $days += $k['days'];
             $interest += $k['interest'];
         }
        $stat['interest'] = $interest - $interest * $data['manage_fee'] / 100;
        $stat['income'] =   $data['reward'] + $data['discount'] + $interest;
        $stat['rate'] = ($stat['income'] / $money) / ($days / 365);
        return $stat;
    }


    //每月还款金额 = （贷款本金 / 还款月数）+（本金 — 已归还本金累计额）×每月利率
    public function getList($data)
    {
        //获取投资天数
        $days = $this->getDays($data['start_time'], $data['term'],$data['term_unit']);
        $dayRate = $this->getDayRate($data['rate'],$data['rate_unit']);
        $money = $data['money'];
        $startTime = strtotime($data['start_time']);
        $lastTime = $startTime + $days * 24 * 60 * 60;
        $i = 0;
        do {
            $endTime = strtotime('+1month', $startTime);
            $currentDays = ($endTime - $startTime) / (24 * 60 *60);
            $startTime = $endTime;
            $lists[$i]['repay_time'] = date('Y-m-d',$endTime);
            $lists[$i]['days'] = $currentDays;
            $lists[$i]['interest'] = $money * $dayRate * $currentDays;
            $lists[$i]['income'] = $lists[$i]['interest'];
            $i++;
        }while($lastTime >= $endTime);

        $personMoney =  $money / $i;
        //重新处理数组
        foreach($lists as $k=>$t) {
            $invest = $money - $personMoney * $k;
            if($k == count($lists) -1 ) {
                $lists[$k]['repay_time'] = date('Y-m-d',$lastTime);
                $lastDays = ($endTime - $lastTime) / (24 * 60 * 60);
                $lists[$k]['days'] -= $lastDays;
                $lists[$k]['interest'] = $invest * $dayRate * $lists[$k]['days'];
                $lists[$k]['income'] = $lists[$k]['interest'] + $personMoney;
            } else {
                $lists[$k]['interest'] = $invest * $dayRate * $lists[$k]['days'];
                $lists[$k]['income'] = $lists[$k]['interest'] + $personMoney;
            }

        }
        return $lists;
    }
}
