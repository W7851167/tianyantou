<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class BookModel extends BaseModel
{
    use SoftDeletes;
    protected $table = 'books';
    protected $primaryKey = 'id';

    /**
     * @param $query
     * 是否含有模板
     */
    public function scopeTemplate($query) {
        return $query->whereNotNull('template');
    }


}
