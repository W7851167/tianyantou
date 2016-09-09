<?php

namespace App\Models;


class CorpTermModel extends BaseModel
{
    protected  $table = 'corp_terms';
    protected $primaryKey = 'id';

    public function avatar()
    {
        return $this->morphTo('App\Models\ImageModel','item');
    }
}
