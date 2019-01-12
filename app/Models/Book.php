<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table="books";
    protected $fillable=['barcode','name','author','translator','book_type_id',
                         'publishing_id','price','page','book_case_id','storage',
                         'publication_day','image'];

    public function bookCase()
    {
        return $this->belongsTo('App\Models\BookCase');
    }

    public function bookType()
    {
        return $this->belongsTo('App\Models\BookType');
    }

    public function publishing()
    {
        return $this->belongsTo('App\Models\Publishing');
    }

    public function borrow()
    {
        return $this->hasMany('App\Models\Borrow');
    }
}
