<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorpModel extends Model
{
    public  $table = 'corps';
    protected  $primaryKey = 'id';


    public function logo()
    {
        return $this->morphOne('App\Models\ImageModel', 'item');
    }
}
