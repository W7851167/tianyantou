<?php

namespace App\Models;


class MessageModel extends BaseModel
{
    protected $table = 'messages';
    protected $primaryKey = 'id';
    protected $fillable = ['sender_id','owner_id','title','body','type','priority'];
    /**
     * @param $title
     * @param $body
     * 发送全局消息(暂无作用）
     */
    public static function sendGlobalMessage($title, $body)
    {
        $data['title'] = $title;
        $data['body'] = $body;
        $data['sender_id'] = 0;
        $data['owner_id'] = 0;
        $data['type'] = 0;
        $data['priority'] = 1;
        return static::firstOrCreate($data);
    }

    /**
     * @param $ownerId
     * @param $title
     * @param $body
     * 发送私有消息
     */
    public static function sendPrivateMessage($ownerId, $title, $body,$senderId=0)
    {
        $data['title'] = $title;
        $data['body'] = $body;
        $data['sender_id'] = $senderId;
        $data['owner_id'] = $ownerId;
        $data['type'] = 1;
        $data['priority'] = 0;
        return static::firstOrCreate($data);
    }

}
