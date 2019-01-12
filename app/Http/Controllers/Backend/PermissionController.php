<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\PermissionService;

class PermissionController extends Controller
{
    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService=$permissionService;
    }

    //分頁列表
    public function index()
    {
        $permission=$this->permissionService->all();
        return view('backend.permission.index', compact('permission'));
    }

    //顯示新增頁
    public function create()
    {
        $pids=$this->permissionService->getMenu();
        return view('backend.permission.create', compact('pids'));
    }

    //儲存
    public function store(Request $request)
    {
        return $this->permissionService->store($request);
    }

    //顯示編輯頁
    public function edit($id)
    {
        $pids=$this->permissionService->getMenu();
        $permission=$this->permissionService->find($id);
        return view('backend.permission.edit', compact('permission', 'pids'));
    }
    //更新儲存
    public function update(Request $request, $id)
    {
        return $this->permissionService->update($request, $id);
    }

    //刪除
    public function destroy($id)
    {
        return $this->permissionService->destroy($id);
    }
}
