<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model
{
    public  $table = 'images';
    protected  $primaryKey = 'id';

    public function item()
    {
        return $this->morphTo();
    }

}
