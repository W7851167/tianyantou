<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\FrontController;
use App\Repositories\CensusRepository;
use Illuminate\Http\Request;

use App\Http\Requests;


class ChartController extends FrontController
{
    public function __construct(CensusRepository $census)
    {
        parent::__initalize();
        $this->census = $census;
    }

    /**
     * @param Request $request
     * 统计日历信息
     */
    public function waitIncomeStats(Request $request)
    {
        $start = $request->get('start');
        $end = $request->get('end');
        $data['amount'] = "￥10000.00";   //账号金额
        $data['receiveIn'] = "￥500.00"; //已领任务
        $data['details'] = $this->census->getIncomesStats($this->user['id'], $start,$end);
        $data['payIn'] = "￥200.00";   //待收益金额
        return $this->ajaxReturn($data);
    }

    /**
     * @param Request $request
     * 近半年收益
     */
    public function incomeStats(Request $request)
    {
        $data['2016-04'] = 1000;
        $data['2016-05'] = 500;
        $data['2016-06'] = 600;
        $data['2016-07'] = 2000;
        $data['2016-08'] = 100;
        $data['2016-09'] = 100;
        return $this->ajaxReturn($data);
    }
}
