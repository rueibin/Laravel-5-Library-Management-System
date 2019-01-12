<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\ReaderRepositoryEloquent;

class ReaderService extends BaseService
{
    protected $route='reader.index';
    protected $reader;

    public function __construct(ReaderRepositoryEloquent $reader)
    {
        $this->reader=$reader;
    }
    
    public function paginate()
    {
        return $this->reader->paginate(10);
    }

    public function store(Request $request)
    {
        $request->validate([
            'barcode'=>'required|max:15|unique:readers',
            'name'=>'required|max:30',
            'gender'=>'required',
            'tel'=>'required|numeric',
            'mobile'=>'required|numeric|digits:10',
            'email'=>'required|email',
            'borrow_book'=>'required|numeric|between:1,10',
            'status'=>'required',
            'memo'=>'max:250',
        ], [
            'barcode.required'=>'請輸入條碼',
            'barcode.max'=>'條碼最大15個字',
            'barcode.unique'=>'條碼重複',
            'name.required'=>'請輸入姓名',
            'name.max'=>'姓名稱最長30個字',
            'gender.required'=>'請選擇性別',
            'tel.required'=>'請輸入電話',
            'tel.numeric'=>'請輸入數字',
            'mobile.required'=>'請輸入手機',
            'mobile.numeric'=>'請輸入數字',
            'mobile.digits'=>'請輸入10碼',
            'email.required'=>'請輸入email',
            'email.email'=>'email格式不對',
            'borrow_book.required'=>'請輸入可借圖書',
            'borrow_book.numeric'=>'請輸入數字',
            'days.between'=>'可以借天1~10天',
            'status.required'=>'請選擇啟用狀態',
            'memo.max'=>'備註最大250個字',
        ]);

        $result=$this->reader->create($request->toArray());
        return $this->result($result, $this->route, $this->type['create']);
    }

    public function find($id)
    {
        return $this->reader->find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barcode'=>'required|max:15',
            'name'=>'required|max:30',
            'gender'=>'required',
            'tel'=>'required|numeric',
            'mobile'=>'required|numeric|digits:10',
            'email'=>'required|email',
            'borrow_book'=>'required|numeric|between:1,10',
            'status'=>'required',
            'memo'=>'max:250',
        ], [
            'barcode.required'=>'請輸入條碼',
            'barcode.max'=>'條碼最大15個字',
            'name.required'=>'請輸入姓名',
            'name.max'=>'姓名稱最長30個字',
            'gender.required'=>'請選擇性別',
            'tel.required'=>'請輸入電話',
            'tel.numeric'=>'請輸入數字',
            'mobile.required'=>'請輸入手機',
            'mobile.numeric'=>'請輸入數字',
            'mobile.digits'=>'請輸入10碼',
            'email.required'=>'請輸入email',
            'email.email'=>'email格式不對',
            'borrow_book.required'=>'請輸入可借圖書',
            'borrow_book.numeric'=>'請輸入數字',
            'borrow_book.between'=>'可以借天1~10天',
            'status.required'=>'請選擇啟用狀態',
            'memo.max'=>'備註最大250個字',
        ]);

        $result=$this->reader->update($request->toArray(), $id);
        return $this->result($result, $this->route, $this->type['update']);
    }

    public function destroy($id)
    {
        $result=$this->reader->destroy($id);
        return $this->result($result, $this->route, $this->type['del']);
    }
}
