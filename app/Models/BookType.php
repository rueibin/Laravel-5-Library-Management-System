<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookType extends Model
{
    protected $table = 'book_types';
    protected $fillable = ['name','borrow_day'];

    public function book()
    {
        return $this->hasOne('App\Models\Book');
    }
}
