<?php

namespace App\Models;


class RecordModel extends BaseModel
{
    protected $table = 'records';
    protected  $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\Models\UserModel');
    }

    
}
