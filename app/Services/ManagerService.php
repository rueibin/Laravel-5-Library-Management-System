<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\ManagerRepositoryEloquent;

class ManagerService extends BaseService
{
    protected $route='manager.index';
    protected $manager;

    public function __construct(ManagerRepositoryEloquent $manager)
    {
        $this->manager=$manager;
    }
    
    public function paginate()
    {
        return $this->manager->paginate(10);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required|min:4|max:20|unique:manager',
            'password' => 'required|min:7|max:20',
            'confirm_password' => 'required|min:7|max:20|same:password',
            'mobile'=>'required|numeric|digits:10',
            'email' => 'required|email|unique:manager',
            'status'=>'required'], [
            'username.required'=>'請填寫帳號',
            'username.min'=>'帳號至少7個字',
            'username.max'=>'帳號最多20個字',
            'username.unique'=>'帳號重複',
            'password.required'=>'請填寫帳號',
            'password.min'=>'帳號至少7個字',
            'password.max'=>'帳號最多20個字',
            'confirm_password.required'=>'請填寫確認密碼',
            'confirm_password.min'=>'確認密碼至少7個字',
            'confirm_password.max'=>'確認密碼最多20字',
            'confirm_password.same'=>'密碼與確認密碼不同',
            'email.required'=>'請填寫email',
            'email.email'=>'不合法的email',
            'email.unique'=>'email重複',
            'status.required'=>'請選擇狀態',
            'mobile.required'=>'請輸入手機',
            'mobile.numeric'=>'請輸入數字',
            'mobile.digits'=>'請輸入10碼',
        ]);
        $result=$this->manager->create($request->toArray());
        return $this->result($result, $this->route, $this->type['create']);
    }

    public function find($id)
    {
        return $this->manager->find($id);
    }

    public function findRoleManager($id)
    {
        return $this->manager->findRoleManager($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username'=>'required|min:4|max:20',
            'mobile'=>'required|numeric|digits:10',
            'email' => 'required|email',
            'status'=>'required'], [
            'username.required'=>'請填寫帳號',
            'username.min'=>'帳號至少7個字',
            'username.max'=>'帳號最多20個字',
            'username.unique'=>'帳號重複',
            'email.required'=>'請填寫email',
            'email.email'=>'不合法的email',
            'email.unique'=>'email重複',
            'status.required'=>'請選擇狀態',
            'mobile.required'=>'請輸入手機',
            'mobile.numeric'=>'請輸入數字',
            'mobile.digits'=>'請輸入10碼',
        ]);

        $result=$this->manager->update($request->toArray(), $id);
        return $this->result($result, $this->route, $this->type['update']);
    }

    public function destroy($id)
    {
        $result=$this->manager->destroy($id);
        return $this->result($result, $this->route, $this->type['del']);
    }
}
