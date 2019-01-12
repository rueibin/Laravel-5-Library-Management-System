<?php

namespace App\Services;

use Illuminate\Http\Request;
use Auth;

class AuthService
{
    public function login(Request $request)
    {
        $request->validate([
            'username'=>'required|min:5|max:20',
            'password'=>'required|min:6|max:20'
        ], [
            'username.required'=>'請輸入帳號',
            'username.min'=>'帳號至少5個字',
            'username.max'=>'帳號最多20個字',
            'password.required'=>'請輸入密碼',
            'password.min'=>'帳號至少5個字',
            'password.max'=>'帳號最多20個字',
        ]);
        
        $data=$request->only(['username','password']);
        $data['status']='1';
        $result=Auth::guard('backend')->attempt($data);

        return $result;
    }
}
