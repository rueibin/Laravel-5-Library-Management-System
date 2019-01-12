<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\BookCaseRepositoryEloquent;

class BookCaseService extends BaseService
{
    protected $route='bookcase.index';
    protected $bookCase;

    public function __construct(BookCaseRepositoryEloquent $bookCase)
    {
        $this->bookCase=$bookCase;
    }
    
    public function paginate()
    {
        return $this->bookCase->paginate(10);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:30|unique:book_cases'
        ], [
            'name.required'=>'請輸入書架名稱',
            'name.max'=>'書架名稱最長30字',
            'name.unique'=>'書架名稱重複',
        ]);
        $result=$this->bookCase->create($request->toArray());
        return $this->result($result, $this->route, $this->type['create']);
    }

    public function find($id)
    {
        return $this->bookCase->find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:30'
        ], [
            'name.required'=>'請輸入書架名稱',
            'name.max'=>'書架名稱最長30字',
        ]);
        $result=$this->bookCase->update($request->toArray(), $id);
        return $this->result($result, $this->route, $this->type['update']);
    }

    public function destroy($id)
    {
        $result=$this->bookCase->destroy($id);
        return $this->result($result, $this->route, $this->type['del']);
    }
}
