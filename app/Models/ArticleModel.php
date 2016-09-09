<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    public  $table = 'articles';
    protected  $primaryKey='id';

    public function item()
    {
        return $this->morphTo();
    }
}
