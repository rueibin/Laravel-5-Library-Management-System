<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Services\ManagerService;
use App\Services\RoleService;

class ManagerController extends Controller
{
    protected $managerService;
    protected $roleService;

    public function __construct(ManagerService $managerService, RoleService $roleService)
    {
        $this->managerService=$managerService;
        $this->roleService=$roleService;
    }

    //分頁列表
    public function index()
    {
        $manager=$this->managerService->paginate();
        return view('backend.manager.index', compact('manager'));
    }

    //顯示新增頁
    public function create()
    {
        $roles=$this->roleService->all();
        return view('backend.manager.create',compact('roles'));
    }

    //儲存
    public function store(Request $request)
    {
        return $this->managerService->store($request);
    }

    //顯示編輯頁
    public function edit($id)
    {
        $manager=$this->managerService->find($id);
        $roles=$this->roleService->all();

        return view('backend.manager.edit', compact('manager','roles'));
    }
    //更新儲存
    public function update(Request $request, $id)
    {
        return $this->managerService->update($request, $id);
    }

    //刪除
    public function destroy($id)
    {
        return $this->managerService->destroy($id);
    }
}
