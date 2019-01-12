<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $table="permissions";
    protected $fillable=['pid','name','slug','url','menu','display_name','description'];

    public function role()
    {
        return $this->belongsToMany('App\Models\Role');
    }
}
