<?php
/*********************************************************************************
 *  PhpStorm - tianyantou
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By tianyantou.com
 * 短信发送接口
 *-------------------------------------------------------------------------------
 * $FILE:SendSms.php
 * $Author:zxs
 * $Dtime:2016/09/23
 ***********************************************************************************/
namespace App\Library\Traits;

use GuzzleHttp\Client as HttpClient;

use Illuminate\Support\Facades\Log;

trait SmsTrait {
    private  $client;

    /**
     * @param $mobile
     * @param $content
     * @param $sendTime 设置发送时间
     * 发送短信
     */
    public function sendSms($mobiles=['18611570121'], $content='您的验证码121【天眼投】',$sendTime=null,$extno='')
    {
        $options = $this->getDefault(true);
        $url = $options['url'];
        $params['action'] = 'send';
        $params['account'] = $options['account'];
        $params['password'] = $options['password'];
        $params['mobile'] = count($mobiles) == 1 ? $mobiles[0] : implode(',',$mobiles);
        $params['content'] = html_entity_decode($content);
        if(!empty($sendTime)) {
            $params['sendTime'] = $sendTime;
        }

        !empty($extno) && $params['extno'] = $extno;
        $url = $url .'?'. http_build_query($params);
        $response =  $this->getClient()->get($url);

        Log::debug('Sms Response:', [
            'Status' => $response->getStatusCode(),
            'Reason' => $response->getReasonPhrase(),
            'Headers' => $response->getHeaders(),
            'Body' => strval($response->getBody()),
        ]);

        return $response;
    }

    /**
     * @return HttpClient
     * 获取客户端http
     */
    private function getClient()
    {
        if (!($this->client instanceof HttpClient)) {
            $this->client = new HttpClient();
        }

        return $this->client;
    }


    /**
     * @param bool|true $debug
     * @return array
     * 短信配置信息
     */
    private function getDefault($debug = true)
    {
        if($debug) {
            return [
                'url'=>'https://dx.ipyy.net/smsJson.aspx',
                'useid'=>'',
                'account'=>'AC00337',
                'password' =>'AC0033700',
            ];
        } else {
            return [
                'url'=>'https://dx.ipyy.net/smsJson.aspx',
                'userid' => '',
                'account'=>'AC00337',
                'password' =>'AC00374'
            ];
        }
    }



}