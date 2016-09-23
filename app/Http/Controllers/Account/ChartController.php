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
        list($account,$receiveIn,$payIn,$stats) = $this->census->getIncomesStats($this->user['id'], $start,$end);
        $data['amount'] = "￥" . $account;   //账号金额
        $data['receiveIn'] = "￥" . $receiveIn; //已领任务
        $data['payIn'] = "￥" . $payIn;   //待收益金额
        $data['details'] = $stats;
        return $this->ajaxReturn($data);
    }

    /**
     * @param Request $request
     * 近半年收益
     */
    public function incomeStats(Request $request)
    {
       $data = $this->census->getHalfYearStat($this->user['id']);
        return $this->ajaxReturn($data);
    }
}
