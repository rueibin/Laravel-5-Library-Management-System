<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\BookTypeRepositoryEloquent;

class BookTypeService extends BaseService
{
    protected $route='booktype.index';
    protected $bookType;

    public function __construct(BookTypeRepositoryEloquent $bookType)
    {
        $this->bookType=$bookType;
    }
    
    public function paginate()
    {
        return $this->bookType->paginate(10);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:30|unique:book_types',
            'borrow_day'=>'required|min:1|max:10|numeric|',
        ], [
            'name.required'=>'請輸入圖書名稱',
            'name.max'=>'圖書名稱最長30字',
            'name.unique'=>'圖書名稱重複',
            'borrow_day.required'=>'請輸入圖書名稱',
            'borrow_day.numeric'=>'請輸入數字',
            'borrow_day.min'=>'最少1天',
            'borrow_day.max'=>'最多10天',
        ]);
        
        $result= $this->bookType->create($request->toArray());
        return $this->result($result, $this->route, $this->type['create']);
    }

    
    public function find($id)
    {
        return $this->bookType->find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:30',
            'borrow_day'=>'required|min:1|max:10|numeric|',
        ], [
            'name.required'=>'請輸入圖書名稱',
            'name.max'=>'圖書名稱最長30字',
            'borrow_day.required'=>'請輸入圖書名稱',
            'borrow_day.numeric'=>'請輸入數字',
            'borrow_day.min'=>'最少1天',
            'borrow_day.max'=>'最多10天',
        ]);

        $result= $this->bookType->update($request->toArray(), $id);
        return $this->result($result, $this->route, $this->type['update']);
    }

    public function destroy($id)
    {
        $result= $this->bookType->destroy($id);
        return $this->result($result, $this->route, $this->type['del']);
    }
}
