<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ReaderService;

class ReaderController extends Controller
{
    protected $readerService;

    public function __construct(ReaderService $readerService)
    {
        $this->readerService=$readerService;
    }
    //分頁列表
    public function index()
    {
        $reader=$this->readerService->paginate();
        return view('backend.reader.index', compact('reader'));
    }

    //顯示新增頁
    public function create()
    {
        return view('backend.reader.create');
    }

    //儲存
    public function store(Request $request)
    {
        return $this->readerService->store($request);
    }

    //顯示編輯頁
    public function edit($id)
    {
        $reader=$this->readerService->find($id);
        return view('backend.reader.edit', compact('reader'));
    }
    //更新儲存
    public function update(Request $request, $id)
    {
        return $this->readerService->update($request, $id);
    }

    //刪除
    public function destroy($id)
    {
        return $this->readerService->destroy($id);
    }
}
