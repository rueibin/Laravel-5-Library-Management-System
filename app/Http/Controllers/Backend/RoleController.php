<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\RoleService;
use App\Services\PermissionService;

class RoleController extends Controller
{
    protected $roleService;
    protected $permissionService;

    public function __construct(RoleService $roleService, PermissionService $permissionService)
    {
        $this->roleService=$roleService;
        $this->permissionService=$permissionService;
    }

    //分頁列表
    public function index()
    {
        $role=$this->roleService->paginate();
        return view('backend.role.index', compact('role'));
    }

    //顯示新增頁
    public function create()
    {
        $permissions=$this->permissionService->all();
        return view('backend.role.create', compact('permissions'));
    }

    //儲存
    public function store(Request $request)
    {
        return $this->roleService->store($request);
    }

    //顯示編輯頁
    public function edit($id)
    {
        $permissions=$this->permissionService->all();
        $role=$this->roleService->find($id);
        if ($role) {
            $roleArray = $role->toArray();
            if ($roleArray['permission']) {
                $roleArray['permission'] = array_column($roleArray['permission'], 'id');
            }
        }
        return view('backend.role.edit', compact('roleArray', 'permissions', 'role'));
    }
    //更新儲存
    public function update(Request $request, $id)
    {
        return $this->roleService->update($request, $id);
    }

    //刪除
    public function destroy($id)
    {
        return $this->roleService->destroy($id);
    }
}
