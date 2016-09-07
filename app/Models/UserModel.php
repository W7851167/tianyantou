<?php

namespace App\Models;


class UserModel extends BaseModelModel
{
    public  $table = 'users';
    protected  $primaryKey = 'id';

    public function avatar()
    {
        return $this->morphOne('App\Models\ImageModel', 'item');
    }

}
