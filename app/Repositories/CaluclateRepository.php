<?php
/*********************************************************************************
 *  PhpStorm - tianyantou
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By tianyantou.com
 * 收益算法业务逻辑处理仓库
 *-------------------------------------------------------------------------------
 * $FILE:CaluclateRepository.php
 * $Author:pzz
 * $Dtime:2016/09/24
 ***********************************************************************************/

namespace App\Repositories;


class CaluclateRepository extends BaseRepository
{
    public function __construct()
    {
    }

    /**
     * 等额本金
     */
    public function equalPrincipal()
    {

    }

    /**
     * 等额本息
     */
    public function equalInterest()
    {

    }

    /**
     * 一次性还本付息
     * @param $rate 利率
     * @param $rateUnit 利率单位
     * @param $term 期限
     * @param $termUnit 期限单位
     */
    public function debtService($money, $rate, $rateUnit, $term, $termUnit)
    {
        if ($termUnit == '月' && $rateUnit == '年') {
            $proceeds = $money * ($rate / 100) * ($term / 12);
        }
        if ($termUnit == '月' && $rateUnit == '月') {
            $proceeds = $money * ($rate / 100) * $term;
        }
        if ($termUnit == '日' && $rateUnit == '年') {
            $proceeds = $money * ($rate / 100) * ($term / 365);
        }
        if ($termUnit == '日' && $rateUnit == '月') {
            $proceeds = $money * ($rate / 100) * ($term / 30);
        }

        return [
            ['money' => $money, 'rate_money' => $proceeds, 'proceeds' => $proceeds],
        ];
    }

    /**
     * 按期还息,到期还本
     */
    public function scheduledPrincipal()
    {

    }
}