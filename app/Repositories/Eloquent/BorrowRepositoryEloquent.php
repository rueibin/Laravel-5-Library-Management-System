<?php

namespace App\Repositories\Eloquent;

use App\Models\Borrow;
use DB;

class BorrowRepositoryEloquent extends BaseRepository
{
    protected $name=Borrow::class;

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    public function findBookID($id, $columns = ['*'])
    {
        return $this->model->where('book_id', $id)->get();
    }
    
    public function findReaderID($id, $columns = ['*'])
    {
        return $this->model->where('reader_id', $id)->get();
    }

    public function updateReturn(array $attributes, $reader_id, $book_id)
    {
        return $this->model->where('reader_id', $reader_id)->where('book_id', $book_id)->update($attributes);
    }

    //排行榜
    public function leaderboard()
    {
        return $this->model->select('book_id', DB::raw('count(id) as borrow_count'))
                    ->groupBy('book_id')->orderBy('borrow_count', 'desc')->limit(5)->get();
    }
  
    //判斷重複借閱
    public function getBorrow($reader_id, $book_id)
    {
        return $this->model->where('reader_id', $reader_id)->where('book_id', $book_id)->where('returned', 2)->get();
    }

    //判斷重複借閱
    public function getkBorrowCount($reader_id)
    {
        return $this->model->where('reader_id', $reader_id)->where('returned', 2)->get();
    }
}
