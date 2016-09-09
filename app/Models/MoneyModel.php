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
}
