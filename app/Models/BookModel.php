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
    public function scopeTemplate($query)
    {
        return $query->whereNotNull('template');
    }

    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = strtotime($value);
    }

    public function getStartTimeAttribute($value)
    {
        return date('Y-m-d', $value);
    }
}
