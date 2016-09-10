<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class CorpTermModel extends BaseModel
{
    use SoftDeletes;
    protected  $table = 'corp_terms';
    protected $primaryKey = 'id';

    public function avatar()
    {
        return $this->morphOne('App\Models\ImageModel','item');
    }
}
