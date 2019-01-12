<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BorrowService;

class BorrowController extends Controller
{
    protected $borrowService;

    public function __construct(BorrowService $borrowService)
    {
        $this->borrowService=$borrowService;
    }

    //顯示借閱頁
    public function index(Request $request)
    {
        return view('backend.borrow.index');
    }

    //顯示歸還
    public function back()
    {
        return view('backend.borrow.back');
    }
    
    //api 獲取讀者
    public function getReader(Request $request)
    {
        return $this->borrowService->getReader($request);
    }

    //api 獲取圖書
    public function getBook(Request $request)
    {
        return $this->borrowService->getBook($request);
    }

    //api 借書
    public function bookBorrow(Request $request)
    {
        return $this->borrowService->borrow($request);
    }

    //api 還書
    public function bookReturn(Request $request)
    {
        return $this->borrowService->back($request);
    }

    //api 獲取圖書借閱
    public function getBookBorrow(Request $request)
    {
        return $this->borrowService->getBookBorrow($request);
    }
}
