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
use App\Models\share;
use App\Repositories\CensusRepository;
use App\Repositories\UserRepository;

use Illuminate\Http\Request;
use App\Models\MoneyModel;
use App\Models\WithdrawModel;
use App\Models\TaskAchieveModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Models\ShareModel;
use App\Models\CouponModel;
use App\Models\CorpModel;
use QRcode;
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
        $user['mobile'] = $this->user['mobile'];
        //print_r($user);
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
    public function recommend()
    {
        //获取用户id为分享标识
        $userId = Session::get('user.passport.id');
        include public_path('qrcode/qrlib.php');
        $name = $userId.'.png';
        $file = '../static/uploads/code/'.$name;
        $data = 'https://m.tianyantou.com/register.html?id='.$userId;
        if(!file_exists($file)) Qrcode::png($data,$file,'',5,1);
        return view('mobile.user.recommend')->with('return',$name);

    }

    public function shareUser(){
        $share = new ShareModel();
        $user_id = input::get('user_id','44');
        $share->userAdd($user_id);
    }
    /**
     * 优惠券
     */
    public function coupon(Request $request)
    {
        //获取用户id
        $userId = Session::get('user.passport.id');
        $model = new CouponModel();
        $return = $model->getCoupon($userId);
        $returnFor = array();
        foreach ($return as $k=>$v){
           $v->pertinence==0 ? '' : $returnFor[]= $v->pertinence;
        }
        $corp = new CorpModel();
        $var = $corp->corpName(array_unique($returnFor));
        $array['0'] = '无限制';
        foreach ($var as $value){
            $array[$value->id] = $value->name;

        }

        foreach ($return as $value){
            $value->pertinence = $array[$value->pertinence];
        }

        return view('mobile.user.coupon')->with('return',$return);
    }

}
