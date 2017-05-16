<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:PassportController.php
 * $Author:wyw
 * $Dtime:2017/5/14
 ***********************************************************************************/

namespace App\Http\Controllers\Mobile;


use App\Http\Controllers\MobileController;
use App\Library\Traits\SmsTrait;
use App\Repositories\CensusRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends MobileController
{
    use SmsTrait;

    public function __construct(
        UserRepository $userRepository,
        CensusRepository $census
    )
    {
        parent::__initalize();
        $this->userRepository = $userRepository;
        $this->census = $census;
    }

    /**
     * 个人中心首页
     */
    public function index()
    {
        return view('mobile.user.index');
    }

    /**
     * 邀请好友累积投资
     */
    public function invitation(Request $request)
    {
        return view('mobile.user.invitation');
    }

    /**
     * 个人投资记录
     */
    public function record(Request $request)
    {
        return view('mobile.user.record');
    }

    /**
     * 推荐有奖
     */
    public function recommend(Request $request)
    {
        return view('mobile.user.recommend');
    }

    /**
     * 优惠券
     */
    public function coupon(Request $request)
    {
        return view('mobile.user.coupon');
    }

}
