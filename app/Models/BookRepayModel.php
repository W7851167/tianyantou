<?php

namespace App\Models;


class BookModel extends BaseModel
{
    protected $table = 'books_repay';
    protected $primaryKey = 'id';
    public $timestamps = false;
}