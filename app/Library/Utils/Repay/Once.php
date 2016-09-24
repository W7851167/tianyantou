<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 一次性还本付息
 * 一次还本付息法，又称到期一次还本付息法，
 * 是指借款人在贷款期内不是按月偿还本息，而是贷款到期后一次性归还本金和利息。
 *-------------------------------------------------------------------------------
 * $FILE:RepayOnce.php
 * $Author:zxs
 * $Dtime:2016/9/24
 ***********************************************************************************/
namespace App\Library\Utils\Repay;

class Once extends  Repay{
    /**
     * 生成总的收入信息
     *  income = (投资总额) * 利率 * 投资月份
     */
    public function getIncomeStats($data)
    {
        $rate = $this->getDayRate($data['rate'], $data['rate_unit']);
        //年利率 日利率
        $yearDays = $data['rate_unit'] == 0 ? 365:($data['rate_unit'] == 1 ? 1 : 360);
        $money = $data['money'] + $data['reward'] + $data['discount'];
        $days = $this->getDays($data['start_time'],$data['term'], $data['term_unit']);
        //年利率 按月投
        if($data['rate_unit'] != 1 && $data['term_unit'] == 0) {
            $interest  =  $money * $data['rate'] / 100 * $data['term'] / 12;  //利息
        } if($data['rate_unit'] != 1 && $data['term_unit'] == 1) {
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


    /**
     * @param $data
     * @return array
     * 获取详情列表
     */
    public function getIncomeList($data)
    {
        $result = $this->getIncomeStats($data);
        $startTime = strtotime($data['start_time']);
        $unit = $data['term_unit'] == 0 ? 'months':'days';
        $endTime = strtotime('+' . $data['term'] . $unit, $startTime);
        $result['repay_time'] = $endTime;
        return $result;
    }
}