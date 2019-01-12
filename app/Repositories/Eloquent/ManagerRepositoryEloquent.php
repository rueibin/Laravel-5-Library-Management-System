<?php

namespace App\Repositories\Eloquent;

use App\Models\Manager;
use DB;

class ManagerRepositoryEloquent extends BaseRepository
{
    protected $name=Manager::class;
    
    public function paginate($limit = null, $columns = ['*'])
    {
        return $this->model->orderBy('id', 'desc')->paginate($limit);
    }

    public function create(array $attributes)
    {
        $manager=$this->model->create([
            'username' => $attributes['username'] ,
            'email' => $attributes['email'] ,
            'mobile' => $attributes['mobile'] ,
            'password' => bcrypt($attributes['password']) ,
            'status' => $attributes['status'] ,
            'gender' => $attributes['gender'] ,
        ]);

        if (isset($attributes['roles'])) {
            $manager->attachRole($attributes['roles']);
        }
        return true;
    }

    public function delete($id)
    {
        return $this->model->delete($id);
    }

    public function destroy($id)
    {
        $this->model->find($id)->delete();
        DB::table('role_manager')->where('manager_id', $id)->delete();
        return true;
    }

    public function find($id, $columns = ['*'])
    {
        return $this->model->find($id);
    }

    public function findRoleManager($id)
    {
        return DB::table('role_manager')->where('manager_id', $id)->get();
    }

    public function update(array $attributes, $id)
    {
        $manager=$this->model->find($id)->update([
            'username' => $attributes['username'] ,
            'mobile' => $attributes['mobile'] ,
            'email' => $attributes['email'] ,
            'status' => $attributes['status'],
            'gender' => $attributes['gender']
        ]);

        if (isset($attributes['roles'])) {
            DB::table('role_manager')->where('manager_id', $id)->delete();
            
            DB::table('role_manager')->insert([
                    'role_id'=>$attributes['roles'],
                    'manager_id'=>$id
                ]);
        }
        return true;
    }
}
