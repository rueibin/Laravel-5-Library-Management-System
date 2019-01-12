<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $table="roles";
    protected $fillable=['name','display_name','description'];

    public function managers()
    {
        return $this->belongsToMany('App\Models\Manager', 'role_manager', 'manager_id', 'role_id');
    }

    public function permission()
    {
        return $this->belongsToMany('App\Models\Permission', 'permission_role', 'role_id', 'permission_id');
    }
}
