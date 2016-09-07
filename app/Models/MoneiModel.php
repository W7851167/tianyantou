<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoneiModel extends Model
{
    public  $table = 'moneis';
    protected  $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\Models\UserModel');
    }
}
