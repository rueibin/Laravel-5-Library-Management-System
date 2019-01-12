<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BookCaseService;

class BookCaseController extends Controller
{
    protected $bookCaseService;

    public function __construct(BookCaseService $bookCaseService)
    {
        $this->bookCaseService=$bookCaseService;
    }
    //分頁列表
    public function index()
    {
        $bookcase=$this->bookCaseService->paginate();
        return view('backend.bookcase.index', compact('bookcase'));
    }
    //顯示新增頁
    public function create()
    {
        return view('backend.bookcase.create');
    }
    //儲存
    public function store(Request $request)
    {
        return $this->bookCaseService->store($request);
    }

    //顯示編輯頁
    public function edit($id)
    {
        $bookcase=$this->bookCaseService->find($id);
        return view('backend.bookcase.edit', compact('bookcase'));
    }

    //更新儲存
    public function update(Request $request, $id)
    {
        return $this->bookCaseService->update($request, $id);
    }

    //刪除
    public function destroy($id)
    {
        return $this->bookCaseService->destroy($id);
    }
}
