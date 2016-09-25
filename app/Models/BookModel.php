<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class BookModel extends BaseModel
{
    use SoftDeletes;
    protected $table = 'books';
    protected $primaryKey = 'id';

    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

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

    public function edit($data)
    {
        $data = $data ? $data : \Request::except(['_token', '_url', 's']);

        if (!empty($data[$this->primaryKey])) {
            $model = $this->findOrNew($data[$this->primaryKey]);
            if (!empty($model)) {
                $this->setModelData($model, $data);
                return $model->save();
            }
        }
        return $this->create($data);
    }
}
