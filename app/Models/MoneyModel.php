<?php

namespace App\Models;


class MoneyModel extends BaseModel
{
    public  $table = 'moneys';
    protected  $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\Models\UserModel','user_id');
    }

    /**
     * 用户首页数据，金额（手机）(6-27xie)
     */
    public function userIndex($userId){
        return $this->where('user_id',$userId)->select('total','money')->first();
    }

    /**
     * @param null $userId
     * @param $data
     * 创建用户信息
     */
    public function saveMoney($userId, $data)
    {
        $model = $this->where('user_id',$userId)->first();
        if(!empty($model)) {
            $this->setModelData($model,$data);
            return $model->save();
        }

        return $this->query()->insertGetId($data);
    }


}
