<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $table="borrows";
    protected $fillable=['reader_id','book_id','borrow','return','real_return','returned'];

    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }

    public function reader()
    {
        return $this->belongsTo('App\Models\Reader');
    }
}
