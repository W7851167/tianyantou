<?php
/*********************************************************************************
 *  积分商城控制器
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By phpad
 * 首页控制器内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:ShopController.php
 * $Author:pzz
 * $Dtime:2016/9/13
 ***********************************************************************************/

namespace App\Http\Controllers\Front;


use App\Http\Controllers\FrontController;
use App\Repositories\CensusRepository;
use Illuminate\Http\Request;

class ShopController extends FrontController
{
    public function __construct(CensusRepository $census)
    {
        parent::__initalize();
        $this->census = $census;
    }

    public function index()
    {
        return view('front.shop.index');
    }



}