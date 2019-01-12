<?php

namespace App\Repositories\Eloquent;

use App\Models\Role;
use DB;

class RoleRepositoryEloquent extends BaseRepository
{
    protected $name=Role::class;
    
    public function paginate($limit = null, $columns = ['*'])
    {
        return $this->model->orderBy('id', 'desc')->paginate($limit);
    }
    
    public function all($columns = ['*'])
    {
        return $this->model->get();
    }

    public function create(array $attributes)
    {
        $data=[
            'name'=>$attributes['name'],
            'display_name'=>$attributes['display_name'],
            'description'=>$attributes['description'],
        ];
        $role=Role::create($data);

        $permissions=explode(",", $attributes['permissions']);
        if (isset($attributes['permissions'])) {
            foreach ($permissions as $permission) {
                $role->permission()->attach($permission);
            }
        }
        return true;
    }
    
    public function delete($id)
    {
        return $this->model->delete($id);
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    public function destroyPermissionRole($id)
    {
        return DB::table('permission_role')->where('role_id', $id)->delete();
    }

    public function createPermissionRole(array $attributes)
    {
        return DB::table('permission_role')->insert($attributes);
    }

    public function findRoleManager($id)
    {
        return DB::table('role_manager')->where('role_id', $id)->get();
    }

    public function find($id, $columns = ['*'])
    {
        return $this->model->with('permission')->find($id);
    }

    public function update(array $attributes, $id)
    {
        return $this->model->find($id)->update($attributes);
    }
}
