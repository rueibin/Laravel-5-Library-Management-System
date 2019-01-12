<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Manager extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;
    use EntrustUserTrait;

    protected $table='manager';
    protected $fillable=['username','password','gender','mobile','email','status','remember_token'];

    public function role()
    {
        return $this->belongsToMany('App\Models\Role', 'role_manager', 'manager_id', 'role_id');
    }
}
