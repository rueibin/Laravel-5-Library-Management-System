<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BookService;
use App\Models\Book;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService=$bookService;
    }
    
    //分頁列表
    public function index()
    {
        $book=$this->bookService->paginate();
        return view('backend.book.index', compact('book'));
    }

    //顯示新增頁
    public function create()
    {
        $bookTypes=$this->bookService->getBookTypeAll();
        $bookCases=$this->bookService->getBookCaseAll();
        $publishings=$this->bookService->getPublishingAll();
        
        return view('backend.book.create', compact('bookTypes', 'bookCases', 'publishings'));
    }
    //儲存
    public function store(Request $request)
    {
        return $this->bookService->store($request);
        // Book::create($request->all());
    }
    //顯示編輯頁
    public function edit($id)
    {
        $book=$this->bookService->find($id);
        $bookTypes=$this->bookService->getBookTypeAll();
        $bookCases=$this->bookService->getBookCaseAll();
        $publishings=$this->bookService->getPublishingAll();

        return view('backend.book.edit', compact('book', 'bookTypes', 'bookCases', 'publishings'));
    }
    //更新儲存
    public function update(Request $request, $id)
    {
        return $this->bookService->update($request, $id);
    }

    //刪除
    public function destroy($id)
    {
        return $this->bookService->destroy($id);
    }
}
