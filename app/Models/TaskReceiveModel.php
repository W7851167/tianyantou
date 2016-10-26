<?php

namespace App\Models;


class TaskReceiveModel extends BaseModel
{
    public $table = 'task_receives';
    protected $primaryKey = 'id';

    /**
     * @param $data
     * 编辑信息
     */
    public function saveBy($data)
    {
        $model = $this;
        $data = $data ? $data : Request::all();
        $data = array_except($data, ['_token', '_url', 's']);

        if (!empty($data[$this->primaryKey])) {
            $model = $this->findOrNew($data[$this->primaryKey]);
            if (!empty($model)) {
                $this->setModelData($model, $data);
                return $model->save();
            }
        }

        if (!empty($data['user_id']) && !empty($data['task_id']) && !empty($data['corp_id'])) {
            $model = $this->where('user_id',$data['user_id'])
                ->where('task_id',$data['task_id'])
                ->where('corp_id',$data['corp_id'])
                ->first();

            if (!empty($model)) {
                $this->setModelData($model, $data);
                return $model->save();
            }
        }


        return $this->query()->insertGetId($data);
    }

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
