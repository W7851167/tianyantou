<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScoreModel extends Model
{
    public  $table = 'scores';
    protected  $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\Models\UserModel');
    }
}
