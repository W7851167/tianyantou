<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    public $table = 'articles';
    protected $primaryKey = 'id';
    protected $fillable = ['item_id', 'item_type', 'content'];

    public function item()
    {
        return $this->morphTo();
    }
}
