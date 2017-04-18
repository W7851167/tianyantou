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
use App\Repositories\ApiRepository;
use App\Repositories\XdataRepository;
use GuzzleHttp\ClientInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Log;
use Cache;


class NiwodaiController extends AdminController
{
    /*
     * 获取到的正常token值  dde07f0c-bb66-4787-8926-2525837b5a79
     */
    const NWD_API_URL = "http://api.niwodai.com/interface/callHttpInterfaces.do";   //你我贷接口地址
    const TOKEN_CODE = "bbeeb8e5-30ef-4a2d-8ddf-cbd45e51ae6d";  //获取token时的code
    const DATA_CODE = "e5a5ac42-14d7-4d64-a52a-f4a8078bf150";  //获取数据时的code
    const APP_ID = "tianyantou";  //接口id
    const APPKEY = "Aa120545322";  //接口key
    const PARTNER_ID = "1037";   //合作id

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
     *  获取你我贷接口数据
     */
    public function index()
    {
        $startTime = $_REQUEST['start_time'];
        $endTime = $_REQUEST['end_time'];
        $token = $this->getToken();//获取token
        $allDatas = $this->getAllData($token,$startTime,$endTime);//获取所有数据
        echo $allDatas;exit;
    }

    /**
     * 获取你我贷token接口
     * accessCode和jsonParam两个参数
     * accessCode固定值，jsonParam看接口需要什么参数(json)
     */
    public function getToken()
    {
        $data = array();
        $data['accessCode'] = self::TOKEN_CODE;
        $app['appId'] = self::APP_ID;
        $app['appKey'] = self::APPKEY;
        $data['jsonParam'] = json_encode($app,true);
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', self::NWD_API_URL,[
            'form_params'=>[
                'accessCode'=>$data['accessCode'],
                'jsonParam'=>$data['jsonParam']
            ]
        ]);
        $result = json_decode($response->getBody(),true);
        $token = $result['data']['accessToken'];
        Log::debug('token=>'.$token);
        return $token;
    }


    /**
     *你我贷查询接口
     */
    public function getAllData($token,$startTime,$endTime)
    {
        $appArray = array();
        $appArray['partner_id'] = self::PARTNER_ID;//合作伙伴id(你我贷提供)(必填)
        $appArray['extaid'] = '';//广告申请id(你我贷提供)
        $appArray['stime'] = $startTime;//开始时间(必填)
        $appArray['etime'] = $endTime;//结束时间(必填)
        $appArray['token'] = $token;//签名(必填)
        $appArray['source_id'] = '';//二级合作伙伴id
        $appArray['goods_id'] = '';//商品编号
//        $appArray['productOath'] = 'j001';//商品类型
        $dataArray['accessCode'] = self::DATA_CODE;
        $dataArray['jsonParam'] = json_encode($appArray,true);

        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST',self::NWD_API_URL,[
            'form_params'=>[
                'accessCode'=>$dataArray['accessCode'],
                'jsonParam'=>$dataArray['jsonParam']
            ]
        ]);
        $resultQuest = $res->getBody();
        Log::debug('dataArray=>'.$dataArray['jsonParam']);
//        echo $resultQuest;exit;
//        return strval($res->getBody());
        return $resultQuest;
    }




}
