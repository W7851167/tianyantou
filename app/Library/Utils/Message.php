<?php
/*********************************************************************************
 *  扩展类型-消息处理
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 相应的消息处理类
 *-------------------------------------------------------------------------------
 * $Author:zhuxishun
 * $Dtime:2016-04-17
 */
namespace App\Library\Utils;


use App\Models\MessageModel;

class Message{

    protected  $type = 'system';
    protected  $view = null;

    /**
     * @param $type
     * 设置消息类型
     */
     protected function  setTemplate() {
         if(view()->exists('vendor.message.system')) {
             $this->view = 'vendor.message.system';
         }
         $this->view = null;
     }

    /**
     * @param null $fromUserId
     * @param $toUserId
     * @param null $view
     * @param array $data
     * @return static
     * 发送消息
     */
    public function send($fromUserId=null, $toUserId, $data=array()) {
        $message = array_only($data,['name']);
        $data = array_except($data, ['name']);
        $message['content'] = $this->view ? view($this->view,$data) : $data['content'];
        $messageModel = MessageModel::create($message);
        $messageModel->from_user_id = $fromUserId;
        $messageModel->item_type = $this->type;
        $messageModel->item_id = $fromUserId == 0 ? 0 : (isset($data['item_id']) ? $data['item_id']:0);
        $messageModel->to_user_id = $toUserId;
        $messageModel->name  = $message['name'];
        return $messageModel->save();
    }

    /**
     * @param $toUserId
     * @param $view
     * @param array $data
     * 发送系统消息
     */
    public function sendSystem($toUserId,$data=array()) {
        return $this->send(0, $toUserId, $data);
    }
}