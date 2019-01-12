<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Auth;

class AuthController extends Controller
{
    protected $authService;

    //登入頁
    public function __construct(AuthService $authService)
    {
        $this->authService=$authService;
    }

    public function login()
    {
        return view('backend.login');
    }

    //檢查資料
    public function check(Request $request)
    {
        $result=$this->authService->login($request);
    
        if ($result) {
            return redirect()->route('home.index');
        } else {
            return redirect('/')->withErrors(['loginError'=>'帳號或密碼錯誤']);
        }
    }

    //登出
    public function logout()
    {
        Auth::guard('backend')->logout();
        return redirect('/');
    }
}
