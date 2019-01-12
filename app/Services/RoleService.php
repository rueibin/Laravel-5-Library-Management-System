<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\RoleRepositoryEloquent;
use DB;

class RoleService extends BaseService
{
    protected $route='role.index';
    protected $role;

    public function __construct(RoleRepositoryEloquent $role)
    {
        $this->role=$role;
    }
    
    public function paginate()
    {
        return $this->role->paginate(10);
    }

    public function all()
    {
        return $this->role->all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:roles',
            'display_name' => 'required|unique:roles',
            'description' => 'max:250'
        ], [
            'name.required'=>'請輸入角色',
            'name.unique'=>'角色重複',
            'display_name.required'=>'請輸入角色名稱',
            'display_name.unique'=>'角色名稱重複',
            'description.max'=>'描述最多250個字',
        ]);

        $result=$this->role->create($request->toArray());
        return $this->result($result, $this->route, $this->type['create']);
    }

    public function find($id)
    {
        return $this->role->find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'display_name' => 'required',
            'description' => 'max:250'
        ], [
            'name.required'=>'請輸入角色',
            'display_name.required'=>'請輸入角色名稱',
            'description.max'=>'描述最多250個字',
        ]);

        $role_data=[
            'name'=>$request->name,
            'display_name'=>$request->display_name,
            'description'=>$request->description,
        ];

        $permissions=explode(",", $request->permissions);

        if (isset($request->permissions)) {
            $this->role->destroyPermissionRole($id);
            foreach ($permissions as $permission) {
                $data=['role_id'=>$id,'permission_id'=>$permission];
                $this->role->createPermissionRole($data);
            }
        }
        $result=$this->role->update($request->toArray(), $id);
        return $this->result($result, $this->route, $this->type['update']);
    }

    public function destroy($id)
    {
        $role_id=$this->role->findRoleManager($id);
        if (count($role_id)==0) {
            // $result=$this->role->destroy($id);
            $result=DB::table('roles')->where('id', $id)->delete();
            return $this->result($result, $this->route, $this->type['del']);
        }
        return $this->result(false, $this->route, $this->type['del']);
    }
}
