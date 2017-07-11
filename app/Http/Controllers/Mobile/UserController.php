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
use App\Models\MoneyModel;
use App\Models\WithdrawModel;
use App\Models\TaskAchieveModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

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
     * 个人中心首页(6-27xie)
     */
    public function index()
    {
       // $user = DB::select('select total,money from ad_moneys where user_id=? limit 1',[$this->user['id']]);
        $model = new MoneyModel();
        $with = new WithdrawModel();
        $user= $model->userIndex($this->user['id']);
        $user['price']= $with->userIndex($this->user['id']);
        return view('mobile.user.index')->with('return',$user);
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
       // print_r( Input::get());
        $key = Input::get('key');
        $model = new TaskAchieveModel();
        switch($key){
            case 'reject': $record=$model->userRecord($this->user['id'],2); $status='已回款';
                break;
            case 'audit': $record=$model->userRecord($this->user['id'],0);$status='审核中';
                break;
            default:$record=$model->userRecord($this->user['id'],1);$status='已投资';
                break;
        }
        return view('mobile.user.record')->with('return',$record)->with('status',$status);
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

    /**
     * 提现
     */
    public function wallet(Request $request)
    {
        return view('mobile.user.wallet');
    }

}
