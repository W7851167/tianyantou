<?php

namespace App\Models;


class ScoreModel extends BaseModel
{
    public  $table = 'scores';
    protected  $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\Models\UserModel','user_id');
    }
}
