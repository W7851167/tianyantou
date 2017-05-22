<?php
/*********************************************************************************
 *  PhpStorm - tianyantou
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:MIndexController.php
 * $Author:wyw
 * $Dtime:2017/3/31
 ***********************************************************************************/
namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\AdminController;
use App\Repositories\CensusRepository;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use Log;
use Cache;


class DoubaojinfuController extends AdminController
{
    const DBJF_API_REGISTER_URL = "http://www.doubaojf.com/export/register";   //豆包金服获取注册数据接口地址
    const DBJF_API_INVEST_URL = "http://www.doubaojf.com/export/invest";   //豆包金服获取投资数据接口地址
    const CHANEL = 1000050;  //渠道标号
    const SIGN = "9a3bbc77433d239705767ca850e58d1b";  //签名
    const INVEST_TYPE = 0;  //查询类型 0：查询所有3:查询收单2：复单

    public function __construct(
        UserRepository $userRepository,
        TaskRepository $tasks,
        CensusRepository $census
    )
    {
        parent::__initalize();
        $this->userRepository = $userRepository;
        $this->tasks = $tasks;
        $this->census = $census;
    }


    /**
     *  获取豆包金服接口数据
     */
    public function index()
    {
        $startTime = $_REQUEST['start_time'];
        $endTime = $_REQUEST['end_time'];
//        $allRegisterDatas = $this->getAllRegisterData($startTime,$endTime);//获取注册所有数据
        $allInvestDatas = $this->getAllInvestData($startTime,$endTime);//获取投资所有数据
        var_dump($allInvestDatas);exit;
        echo $allInvestDatas;exit;
    }


    /**
     *   豆包金服查询注册接口
     */
    public function getAllRegisterData($startTime,$endTime)
    {
        $dataArray = array();
        $dataArray['chanel'] = self::CHANEL;//渠道标号(豆包金服提供)(必填)
        $dataArray['mobile'] = '';//手机号
        $dataArray['startTime'] = $startTime;//开始时间
        $dataArray['endTime'] = $endTime;//结束时间
        $dataArray['sign'] = self::SIGN;//签名(必填)
        $dataArray['investType'] = self::INVEST_TYPE;//投资类型

        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST',self::DBJF_API_REGISTER_URL);
        $resultQuest = $res->getBody();
        Log::debug('dataArray=>'.json_encode($dataArray));
        return $resultQuest;
    }

    /**
     *   豆包金服所有投资数据接口
     */
    public function getAllInvestData($startTime,$endTime)
    {
        $dataArray = array();
        $dataArray['chanel'] = self::CHANEL;//渠道标号(豆包金服提供)(必填)
        $dataArray['mobile'] = '';//手机号
        $dataArray['startTime'] = $startTime;//开始时间
        $dataArray['endTime'] = $endTime;//结束时间
        $dataArray['sign'] = self::SIGN;//签名(必填)
        $dataArray['investType'] = self::INVEST_TYPE;//投资类型

        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST',self::DBJF_API_INVEST_URL);
        $resultQuest = $res->getBody();
        Log::debug('dataArray=>'.json_encode($dataArray));
        return $resultQuest;
    }




}
