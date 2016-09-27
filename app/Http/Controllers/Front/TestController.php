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

        $userModel = $this->census->userModel->find(1);
        $result = Event::fire(new ValidateEmail($userModel));
        //$result = $this->dispatch(new SendEmailJob('tianyantou',$userModel));
        dd($result);
    }

}