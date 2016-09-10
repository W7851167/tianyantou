<?php

namespace App\Models;


class ArticleModel extends BaseModel
{
    public $table = 'articles';
    protected $primaryKey = 'id';
    protected $fillable = ['item_id', 'item_type', 'content'];

    public function item()
    {
        return $this->morphTo();
    }
}
