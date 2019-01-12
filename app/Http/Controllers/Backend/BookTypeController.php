<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BookTypeService;

class BookTypeController extends Controller
{
    protected $bookTypeService;

    public function __construct(BookTypeService $bookTypeService)
    {
        $this->bookTypeService=$bookTypeService;
    }
    
    //分頁列表
    public function index()
    {
        $booktype=$this->bookTypeService->paginate();
        return view('backend.booktype.index', compact('booktype'));
    }

    //顯示新增頁
    public function create()
    {
        return view('backend.booktype.create');
    }
    //儲存
    public function store(Request $request)
    {
        return $this->bookTypeService->store($request);
    }
    //顯示編輯頁
    public function edit($id)
    {
        $booktype=$this->bookTypeService->find($id);
        return view('backend.booktype.edit', compact('booktype'));
    }
    //更新儲存
    public function update(Request $request, $id)
    {
        return $this->bookTypeService->update($request, $id);
    }

    //刪除
    public function destroy($id)
    {
        return $this->bookTypeService->destroy($id);
    }
}
