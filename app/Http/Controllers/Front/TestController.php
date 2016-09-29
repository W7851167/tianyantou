<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:TestController.php
 * $Author:zxs
 * $Dtime:2016/9/23
 ***********************************************************************************/

namespace App\Http\Controllers\Front;


use App\Events\ValidateEmail;
use App\Http\Controllers\FrontController;
use App\Jobs\SendEmailJob;
use App\Jobs\SendSmsJob;
use App\Library\Traits\SmsTrait;
use App\Repositories\CensusRepository;
use Illuminate\Support\Facades\Event;

class TestController extends FrontController
{
    use SmsTrait;

    public function __construct(CensusRepository $census)
    {
        $this->census = $census;
    }

    public function index()
    {

        $config =[
            'rate' => 12,         //利率
            'rate_unit' => 0,      //0年利率 1、日利率 2、年利率（按360天计算）
            'money' => 10000,       //投资金额
            'term' => 56,           //投资期限
            'term_unit' => 1,     //投资期限单位 0 月 1日
            'repay_type' =>1,    //还款方式，具体属性repayType
            'manage_fee' => 1, //管理费率
            'reward' => 200,     //奖励
            'discount' => 100,   //折扣奖励
            'start_time' => '2016-09-24',    //起息日期;
        ];
        $obj = app()->make('LibraryManager')->create('income');
        $result = $obj->_init($config)->getStats();
        dd($result);

        $params = [
            'email' => '2384108741@qq.com',
            'username' => 'pengzhizhuang',
            'url' => 'www.tianyantou.com',
            'type' => 'find',
        ];
        event(new ValidateEmail($params));
//        $this->sendSms(['15072309522']);
//        return $this->dispatch(new SendSmsJob(['message'=>'content']));

//       $result = $this->dispatch((new SendSmsJob(['name'=>'content'])));
//        dd($result);
        //return authcode('1','ENCODE');

//        $userModel = $this->census->userModel->find(1);
//        $result = Event::fire(new ValidateEmail($userModel));
        //$result = $this->dispatch(new SendEmailJob('tianyantou',$userModel));
//        dd($result);
    }

}