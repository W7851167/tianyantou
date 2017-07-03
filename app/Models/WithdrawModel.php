<?php

namespace App\Models;


class WithdrawModel extends BaseModel
{
    public  $table = 'withdraws';
    protected  $primaryKey = 'id';
    /**
     * 用户首页数据，提现（手机）（6-27xie）
     */
    public function userIndex($userId){
        $return = $this->where('user_id',$userId)->where('status',0)->first();
        return empty($return)? '暂无待收':'往期提现';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 对应用户信息
     */
    public function user()
    {
        return $this->belongsTo('App\Models\UserModel','user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 对应银行信息
     */
    public function bank()
    {
        return $this->belongsTo('App\Models\BankModel','bank_id');
    }
}
