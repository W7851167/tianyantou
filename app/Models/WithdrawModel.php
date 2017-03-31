<?php

namespace App\Models;


class WithdrawModel extends BaseModel
{
    public  $table = 'withdraws';
    protected  $primaryKey = 'id';

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
