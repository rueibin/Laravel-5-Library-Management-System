<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publishing extends Model
{
    protected $table = 'publishings';
    protected $fillable = ['name'];

    public function book()
    {
        return $this->hasOne('App\Models\Book');
    }
}
