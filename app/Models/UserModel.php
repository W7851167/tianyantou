<?php

namespace App\Models;


class UserModel extends BaseModel
{
    public $table = 'users';
    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     * 获取用户头像数据
     */
    public function avatars()
    {
        return $this->morphMany('App\Models\ImageModel', 'item');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * 获取电子钱包数据
     */
    public function money()
    {
        return $this->hasOne('App\Models\MoneyModel', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * 获取某用户赚取积分列表
     */
    public function scores()
    {
        return $this->hasMany('App\Models\ScoreModel', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     *
     * 获取用户的银行卡/支付宝账号信息
     */
    public function bank()
    {
        return $this->hasOne('App\Models\BankModel', 'user_id');
    }

    /**
     * @param $value
     *
     * 设置密码字段属性,hash密码字段
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

    //签到信息
    public function past()
    {
        return $this->hasOne('App\Models\PastModel','user_id');
    }

    /**
     * 角色
     */
    public function role()
    {
        return $this->belongsTo('App\Models\RoleModel','roles');
    }

}
