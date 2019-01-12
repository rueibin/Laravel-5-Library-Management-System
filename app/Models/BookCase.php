<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCase extends Model
{
    protected $table = 'book_cases';
    protected $fillable = ['name'];

    public function book()
    {
        return $this->hasOne('App\Models\Book');
    }
}
