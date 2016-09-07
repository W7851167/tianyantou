<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    public  $table = 'users';
    protected  $primaryKey = 'id';

    public function avatar()
    {
        return $this->morphOne('App\Models\ImageModel', 'item');
    }

}
