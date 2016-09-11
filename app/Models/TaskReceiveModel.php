<?php

namespace App\Models;


class TaskReceiveModel extends BaseModel
{
    public $table = 'task_receives';
    protected $primaryKey = 'id';
    public  $timestamps = false;

    /**
     * 获取任务名称
     */
    public function task(){
        return $this->belongsTo('App\Models\TaskModel','task_id');
    }

    /**
     * 获取平台模型
     */
    public function corp()
    {
        return $this->belongsTo('App\Models\CorpModel','corp_id');
    }

    /**
     * 获取领任务用户
     */
    public function user()
    {
        return $this->belongsTo('App\Models\UserModel','user_id');
    }

    public function achieves()
    {
        return $this->hasMany('App\Models\TaskAchieveModel','receive_id');
    }
}
