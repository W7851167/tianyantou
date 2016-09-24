<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:Repay.php
 * $Author:zxs
 * $Dtime:2016/9/24
 ***********************************************************************************/

namespace App\Library\Utils\Repay;


class Repay
{
    /**
     * @param $rate
     * @param $unit
     * 获取日利率
     * $unit 0 年利率(365天) 1日利率 2年利率(360天)
     */
    protected function getDayRate($rate, $unit)
    {
        $days = $unit == 0 ? 365:($unit ==1? 1 : 360);
        //echo $days;
        return $rate / $days / 100;
    }

    /**
     * @param $startTime
     * @param $term
     * @param $unit
     * 获取投资天数
     */
    protected function getDays($startTime, $term, $unit)
    {
        $startTime = strtotime($startTime);
        $unit = $unit == 0 ? 'months':'days';
        $endTime = strtotime('+' . $term . $unit, $startTime);
        return ($endTime - $startTime) / 24 / 60 / 60;
    }


}