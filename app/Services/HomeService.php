<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\BorrowRepositoryEloquent;

class HomeService extends BaseService
{
    protected $route='home.index';
    protected $borrow;

    public function __construct(BorrowRepositoryEloquent $borrow)
    {
        $this->borrow=$borrow;
    }
    
    //排名列表
    public function leaderboard()
    {
        $datas=$this->borrow->leaderboard();
        
        if (count($datas)) {
            $num=1;
            foreach ($datas as $v) {
                $data[]=[
                'no'=>$num,
                'book_name'=>$v->book->name,
                'book_type'=>$v->book->bookType->name,
                'book_case'=>$v->book->bookCase->name,
                'publishing'=>$v->book->publishing->name,
                'author'=>$v->book->author,
                'price'=>$v->book->price,
                'count'=>$v->borrow_count
            ];
                $num++;
            }
            return $data;
        }
        return null;
    }
}
