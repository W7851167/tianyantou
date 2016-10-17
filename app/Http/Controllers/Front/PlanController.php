<?php
/**
 * Created by PhpStorm.
 * User: pengzhizhuang
 * Date: 16/10/17
 * Time: 下午5:39
 */

namespace App\Http\Controllers\Front;


use App\Http\Controllers\FrontController;

class PlanController extends FrontController
{
    public function __construct()
    {
        parent::__initalize();
    }

    public function index()
    {
        return view('front.plan.index');
    }
}