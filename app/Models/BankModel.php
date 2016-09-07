<?php

namespace App\Models;


class BankModel extends BaseModel
{
    public  $table = 'banks';
    protected  $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\Models\UserModel');
    }
}
