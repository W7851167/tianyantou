<?php

namespace App\Models;


class WithdrawModel extends BaseModel
{
    public  $table = 'withdraws';
    protected  $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\Models\UserModel');
    }
}
