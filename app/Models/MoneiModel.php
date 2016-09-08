<?php

namespace App\Models;


class MoneiModel extends BaseModel
{
    public  $table = 'moneis';
    protected  $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\Models\UserModel');
    }
}
