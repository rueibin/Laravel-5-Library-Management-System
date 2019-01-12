<?php

namespace App\Repositories\Eloquent;

use App\Models\Permission;
use DB;

class PermissionRepositoryEloquent extends BaseRepository
{
    protected $name=Permission::class;

    public function all($columns = ['*'])
    {
        return $this->model->all();
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function delete($id)
    {
        return $this->model->delete($id);
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id, $columns = ['*'])
    {
        return $this->model->find($id);
    }

    public function findPermissionRole($id)
    {
        return DB::table('permission_role')->where('permission_id', $id)->get();
    }

    public function update(array $attributes, $id)
    {
        return $this->model->find($id)->update($attributes);
    }

    public function getMenu()
    {
        return $this->model->where('menu', '1')->get();
    }
}
