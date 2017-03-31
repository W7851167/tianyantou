<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:Quarter.php
 * $Author:zxs
 * $Dtime:2016/9/30
 ***********************************************************************************/

namespace App\Library\Utils\Repay;


class Quarter extends  Repay
{
    public function  getStats($data)
    {
        $rate = $this->getDayRate($data['rate'], $data['rate_unit']);
        //年利率 日利率
        $yearDays = $data['rate_unit'] == 0 ? 365:($data['rate_unit'] == 1 ? 1 : 360);
        $money = $data['money'] + $data['reward'] + $data['discount'];
        $days = $this->getDays($data['start_time'],$data['term'], $data['term_unit']);
        //年利率 按月投
        if($data['rate_unit'] != 1 && $data['term_unit'] == 0) {
            $interest  =  $money * $data['rate'] / 100 * $data['term'] / 12;  //利息
        } else if($data['rate_unit'] != 1 && $data['term_unit'] == 1) {
            $interest = $money * $data['rate'] / 100 * $days / $yearDays;
        } else {
            $interest  =  $money * $rate *  $days;  //利息
        }

        $fee = $interest * $data['manage_fee'] / 100;
        $interest = $interest - $fee;
        $income = $interest + $data['reward'] + $data['discount'];
        $yearRate = ($income / $money) / ($days / 365);

        return [
            'income' =>$income,
            'interest' =>$interest,
            'reward' => $data['reward'] + $data['discount'],
            'rate' => $yearRate
        ];
    }

    public function getList($data)
    {
        $days = $this->getDays($data['start_time'], $data['term'], $data['term_unit']);
        $dayRate = $this->getDayRate($data['rate'],$data['rate_unit']);
        $money = $data['money'] + $data['reward'] + $data['discount'];
        $startTime = strtotime($data['start_time']);
        $lists = [];
        $i = 0;
        $lastTime = $startTime + $days * 24 * 60 * 60;
        do {
            $endTime = strtotime('+3month', $startTime);
            $endTime = $endTime >= $lastTime ? $lastTime : $endTime;
            $currentDays = ($endTime - $startTime) / (24 * 60 *60);
            $startTime = $endTime;
            $lists[$i]['repay_time'] = date('Y-m-d',$endTime);
            $lists[$i]['days'] = $currentDays;
            $lists[$i]['interest'] = $money * $dayRate * $currentDays;
            $lists[$i]['income'] = 0;
            $i++;
        }while($lastTime > $endTime);

        //处理最后一个月
        $lastIndex = count($lists) - 1;
        $lists[$lastIndex]['income'] = $lists[$lastIndex]['interest'] + $data['money'] + $data['reward'] + $data['discount'];
        return $lists;
    }
}