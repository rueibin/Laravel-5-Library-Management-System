<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\PublishingRepositoryEloquent;

class PublishingService extends BaseService
{
    protected $route='publishing.index';
    protected $publishing;

    public function __construct(PublishingRepositoryEloquent $publishing)
    {
        $this->publishing=$publishing;
    }
    
    public function paginate()
    {
        return $this->publishing->paginate(10);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:30|unique:publishings'
        ], [
            'name.required'=>'請輸入出版名稱',
            'name.max'=>'出版社名稱最長30字',
            'name.unique'=>'出版社名稱重複',
        ]);

        $result=$this->publishing->create($request->toArray());
        return $this->result($result, $this->route, $this->type['create']);
    }

    public function find($id)
    {
        return $this->publishing->find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:30'
        ], [
            'name.required'=>'請輸入出版名稱',
            'name.max'=>'出版社名稱最長30字',
        ]);
        $result=$this->publishing->update($request->toArray(), $id);
        return $this->result($result, $this->route, $this->type['update']);
    }

    public function destroy($id)
    {
        $result=$this->publishing->destroy($id);
        return $this->result($result, $this->route, $this->type['del']);
    }
}
