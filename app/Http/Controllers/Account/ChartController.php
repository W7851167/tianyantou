<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\FrontController;
use Illuminate\Http\Request;

use App\Http\Requests;


class ChartController extends FrontController
{
    public function __construct()
    {
        parent::__initalize();
    }

    /**
     * @param Request $request
     * 统计日历信息
     */
    public function waitIncomeStats(Request $request)
    {
        $data['amount'] = "￥10000.00";
        $data['billAmt'] = "￥500.00";
        $data['details'] = ['sdfsf'];
        $data['dueIn'] = "￥200.00";
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
