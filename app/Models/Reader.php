<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    protected $table = 'readers';
    protected $fillable = ['name','gender','barcode','tel','mobile','email','borrow_book','status','memo'];

    public function borrow()
    {
        return $this->borrow('App\Models\Borrow');
    }
}
