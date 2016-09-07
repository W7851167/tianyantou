<?php

namespace App\Models;


class UserModel extends BaseModel
{
    public  $table = 'users';
    protected  $primaryKey = 'id';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     * 获取用户头像数据
     */
    public function avatar()
    {
        return $this->morphOne('App\Models\ImageModel', 'item');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * 获取电子钱包数据
     */
    public function money()
    {
        return $this->hasOne('App\Models\MoneiModel');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * 获取某用户赚取积分列表
     */
    public function scores()
    {
        return $this->hasMany('App\Models\ScoreModel');
    }

}
