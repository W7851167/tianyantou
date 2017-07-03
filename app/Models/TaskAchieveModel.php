<?php

namespace App\Models;


class TaskAchieveModel extends BaseModel
{
    public $table = 'task_achieves';
    protected $primaryKey = 'id';
    /**
     * 用户投资记录（手机）（2017-6-27xie）
     */
    public function userRecord($userId,$status){
        return TaskAchieveModel::from('task_achieves as a')
            ->join('tasks as t','a.task_id','=','t.id')
            ->join('corps as c','a.corp_id','=','c.id')
            ->select('c.name','c.logo','t.mratio','t.title','t.ratio','a.mobile','a.created_at','a.price','a.term')
            ->where('a.user_id',$userId)->where('a.status',$status)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 任务模型
     */
    public function task()
    {
        return $this->belongsTo('App\Models\TaskModel','task_id');
    }

    /**
     * 接收任务模型
     */
    public function receive()
    {
        return $this->belongsTo('App\Models\TaskReceiveModel','receive_id');
    }

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
}
