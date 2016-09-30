<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:Principal.php
 * $Author:zxs
 * $Dtime:2016/9/24
 ***********************************************************************************/

namespace App\Library\Utils\Repay;


class Principal extends  Repay
{
    //[贷款本金×月利率×（1+月利率）^还款月数]÷[（1+月利率）^还款月数－1]
    public function getStats($data)
    {
        $interest =  $this->getPrincipal($data);
        $money = $data['money'] + $data['reward'] + $data['discount'];
        $stat['interest'] = $interest - $interest * $data['manage_fee'] / 100;
        $stat['income'] = $stat['interest'] + $data['reward'] + $data['discount'];
        $stat['reward'] = $data['reward'] + $data['discount'];
        $days = $this->getDays($data['start_time'],$data['term'], $data['term_unit']);
        $stat['rate']  = ($stat['income'] / $money) / ($days / 365);
        return $stat;
    }


    /**
     * @param $data
     * 获取列表
     */
    public function getList($data)
    {
        $startTime = strtotime($data['start_time']);
        $days = $this->getDays($data['start_time'], $data['term'],$data['term_unit']);
        $dayRate = $this->getDayRate($data['rate'],$data['rate_unit']);
        $i = 0;
        $lastTime = $startTime + $days * 24 * 60 * 60;
        $hasIncome = 0;
        do {
            $endTime = strtotime('+1month', $startTime);
            $endTime = $endTime >= $lastTime ? $lastTime : $endTime;
            $currentDays = ($endTime - $startTime) / (24 * 60 *60);
            $startTime = $endTime;
            $lists[$i]['repay_time'] = date('Y-m-d',$endTime);
            $lists[$i]['days'] = $currentDays;
            $currentMonthPrincipal = $this->getPersonPrincipal($data);
            $interest = ($data['money'] - $hasIncome) * $dayRate * $currentDays;
            $income  = $currentMonthPrincipal - $interest;
            $hasIncome += $income;
            $lists[$i]['interest'] = $interest;
            $lists[$i]['income'] = $income;
            $i++;
        }while($lastTime > $endTime);

          $lastIndex = count($lists) - 1;
        $lists[$lastIndex]['income'] +=  $data['reward'] + $data['discount'];

        return $lists;
    }

    /**
     * @param $data
     * 获取每月还款金额
     */
    private function getPersonPrincipal($data)
    {
        $monthRate = $this->getMonthRate($data['rate'],$data['rate_unit']);
        $rate = $monthRate + 1;
        $son = $data['money'] * $monthRate * pow($rate, $data['term']);
        $mum = pow($rate,$data['term']) - 1;
        return $son / $mum;
    }

    /**
     * @param $data
     * @return mixed
     * 获取总的利息
     */
    private function getPrincipal($data)
    {
        return $data['term'] * $this->getPersonPrincipal($data) - $data['money'];
    }

    /**
     * @param $data
     * @return mixed
     * 获取总的金额
     */
    private function getTotal($data)
    {
        return $data['term'] * $this->getPersonPrincipal($data);
    }

}