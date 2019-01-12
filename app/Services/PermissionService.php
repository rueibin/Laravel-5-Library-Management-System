<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\PermissionRepositoryEloquent;

class PermissionService extends BaseService
{
    protected $route='permission.index';
    protected $permission;

    public function __construct(PermissionRepositoryEloquent $permission)
    {
        $this->permission=$permission;
    }

    public function all()
    {
        $permissions_raw=$this->permission->all();
        return $this->sortPermissions($permissions_raw);
    }
    
    public function getMenu()
    {
        $permissions_raw=$this->permission->getMenu();
        return $this->sortPermissions($permissions_raw);
    }

    public function store(Request $request)
    {
        $request->validate([
            'display_name' => 'required',
            'name'=>'required',
            'slug' => 'required|unique:permissions',
            'menu' => 'required',
            'description'=>'max:200'
        ], [
            'display_name.required'=>'請輸入權限名稱',
            'name.required'=>'請輸入權限',
            'slug.required'=>'請輸入路由別名',
            'slug.unique'=>'路由別名重複',
            'menu.required'=>'請選擇',
            'description.max'=>'最多200字',
        ]);

        $result=$this->permission->create($request->toArray());
        return $this->result($result, $this->route, $this->type['create']);
    }

    public function find($id)
    {
        return $this->permission->find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'display_name' => 'required',
            'name'=>'required',
            'slug' => 'required',
            'menu' => 'required',
            'description'=>'max:200'
        ], [
            'display_name.required'=>'請輸入權限名稱',
            'name.required'=>'請輸入權限',
            'slug.required'=>'請輸入路由別名',
            'menu.required'=>'請選擇',
            'description.max'=>'最多200字',
        ]);

        $result=$this->permission->update($request->toArray(), $id);
        return $this->result($result, $this->route, $this->type['update']);
    }

    public function destroy($id)
    {
        $permission_id=$this->permission->findPermissionRole($id);
        if (count($permission_id)==0) {
            $result=$this->permission->destroy($id);
            return $this->result($result, $this->route, $this->type['del']);
        }
        return $this->result(false, $this->route, $this->type['del']);
    }
}
