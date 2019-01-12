<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PublishingService;

class PublishingController extends Controller
{
    protected $publishingService;

    public function __construct(PublishingService $publishingService)
    {
        $this->publishingService=$publishingService;
    }
    //分頁列表
    public function index()
    {
        $publishing=$this->publishingService->paginate();
        return view('backend.publishing.index', compact('publishing'));
    }

    //顯示新增頁
    public function create()
    {
        return view('backend.publishing.create');
    }

    //儲存
    public function store(Request $request)
    {
        return $this->publishingService->store($request);
    }

    //顯示編輯頁
    public function edit($id)
    {
        $publishing=$this->publishingService->find($id);
        return view('backend.publishing.edit', compact('publishing'));
    }
    //更新儲存
    public function update(Request $request, $id)
    {
        return $this->publishingService->update($request, $id);
    }

    //刪除
    public function destroy($id)
    {
        return $this->publishingService->destroy($id);
    }
}
