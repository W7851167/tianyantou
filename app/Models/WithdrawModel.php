<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WithdrawModel extends Model
{
    public  $table = 'withdraws';
    protected  $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\Models\UserModel');
    }
}
