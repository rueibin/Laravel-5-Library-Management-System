<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\BookRepositoryEloquent;
use App\Repositories\Eloquent\PublishingRepositoryEloquent;
use App\Repositories\Eloquent\BookTypeRepositoryEloquent;
use App\Repositories\Eloquent\BookCaseRepositoryEloquent;

class BookService extends BaseService
{
    protected $route='book.index';
    protected $book;
    protected $publishing;
    protected $bookType;
    protected $bookCase;
    

    public function __construct(BookRepositoryEloquent $book, PublishingRepositoryEloquent $publishing, BookTypeRepositoryEloquent $bookType, BookCaseRepositoryEloquent $bookCase)
    {
        $this->book=$book;
        $this->publishing=$publishing;
        $this->bookType=$bookType;
        $this->bookCase=$bookCase;
    }
    
    public function paginate()
    {
        return $this->book->paginate(10);
    }

    public function getBookCaseAll()
    {
        return $this->bookCase->all();
    }

    public function getBookTypeAll()
    {
        return $this->bookType->all();
    }

    public function getPublishingAll()
    {
        return $this->publishing->all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'barcode'=>'required|max:30|unique:books',
            'name'=>'required|max:30|unique:books',
            'author'=>'required|max:30',
            'translator'=>'max:30',
            'book_type_id'=>'required|numeric',
            'publishing_id'=>'required|numeric',
            'price'=>'required|numeric',
            'page'=>'required|numeric',
            'book_case_id'=>'required|numeric',
            'storage'=>'required|numeric',
            'publication_day'=>'required|date|date_format:Y/m/d',
            'image' => 'required | mimes:jpeg,jpg,png | max:1000',

        ], [
            'barcode.required'=>'請輸入出書名',
            'barcode.max'=>'書名名稱最長30字',
            'barcode.unique'=>'書名稱重複',
            'name.required'=>'請輸入出書名',
            'name.max'=>'書名名稱最長30字',
            'name.unique'=>'書名稱重複',
            'author.required'=>'請輸入作者',
            'author.max'=>'作者名稱最長30字',
            'translator.max'=>'譯者名稱最長30字',
            'book_type_id.required'=>'請選擇圖書類型',
            'publishing_id.required'=>'請選擇出版社',
            'price.required'=>'請輸入價格',
            'price.numeric'=>'請輸入數字',
            'page.required'=>'請輸入頁數',
            'page.numeric'=>'請輸入數字',
            'book_case_id.required'=>'請選擇書架',
            'storage.required'=>'請輸入數量',
            'storage.numeric'=>'請輸入數字',
            'publication_day.required'=>'請輸入出版日',
            'publication_day.date'=>'日期格式不對',
            'publication_day.date_format'=>'日期格式為Y/m/d',
            'image.required'=>'請上傳圖片',
            'image.mimes'=>'格式只能是jpeg,jpg,png',
            'image.max'=>'最大1M',
        ]);
        
        $image_name = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('upload'), $image_name);

        $data=[
            'barcode'=>$request->barcode,
            'name'=>$request->name,
            'author'=>$request->author,
            'translator'=>$request->translator,
            'book_type_id'=>$request->book_type_id,
            'publishing_id'=>$request->publishing_id,
            'price'=>$request->price,
            'page'=>$request->page,
            'book_case_id'=>$request->book_case_id,
            'storage'=>$request->storage,
            'publication_day'=>$request->publication_day,
            'image' =>$image_name,
        ];
        $result=$this->book->create($data);
        return $this->result($result, $this->route, $this->type['create']);
    }

    public function find($id)
    {
        return $this->book->find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barcode'=>'required|max:30',
            'name'=>'required|max:30',
            'author'=>'required|max:30',
            'translator'=>'max:30',
            'book_type_id'=>'required|numeric',
            'publishing_id'=>'required|numeric',
            'price'=>'required|numeric',
            'page'=>'required|numeric',
            'book_case_id'=>'required|numeric',
            'storage'=>'required|numeric',
            'publication_day'=>'required|date|date_format:Y-m-d',
            'image' => 'mimes:jpeg,jpg,png| max:1000',

        ], [
            'barcode.required'=>'請輸入出書名',
            'barcode.max'=>'書名名稱最長30字',
            'barcode.unique'=>'書名稱重複',
            'name.required'=>'請輸入出書名',
            'name.max'=>'書名名稱最長30字',
            'name.unique'=>'書名稱重複',
            'author.required'=>'請輸入作者',
            'author.max'=>'作者名稱最長30字',
            'translator.max'=>'譯者名稱最長30字',
            'book_type_id.required'=>'請選擇圖書類型',
            'publishing_id.required'=>'請選擇出版社',
            'price.required'=>'請輸入價格',
            'price.numeric'=>'請輸入數字',
            'page.required'=>'請輸入頁數',
            'page.numeric'=>'請輸入數字',
            'book_case_id.required'=>'請選擇書架',
            'storage.required'=>'請輸入數量',
            'storage.numeric'=>'請輸入數字',
            'publication_day.required'=>'請輸入出版日',
            'publication_day.date'=>'日期格式不對',
            'publication_day.date_format'=>'日期格式為Y-m-d',
            'image.mimes'=>'格式只能是jpeg,jpg,png',
            'image.max'=>'最大1M',
        ]);

        $image_name=$request->old_image;
        if (!is_null($request->image)) {
            $image_name = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload'), $image_name);
        }

        $data=[
            'barcode'=>$request->barcode,
            'name'=>$request->name,
            'author'=>$request->author,
            'translator'=>$request->translator,
            'book_type_id'=>$request->book_type_id,
            'publishing_id'=>$request->publishing_id,
            'price'=>$request->price,
            'page'=>$request->page,
            'book_case_id'=>$request->book_case_id,
            'storage'=>$request->storage,
            'publication_day'=>$request->publication_day,
            'image' =>$image_name,
        ];

        $result=$this->book->update($data, $id);
        return $this->result($result, $this->route, $this->type['update']);
    }

    public function destroy($id)
    {
        $result=$this->book->destroy($id);
        return $this->result($result, $this->route, $this->type['del']);
    }
}
