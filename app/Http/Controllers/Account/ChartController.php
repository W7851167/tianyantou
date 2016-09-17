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

    }
}
