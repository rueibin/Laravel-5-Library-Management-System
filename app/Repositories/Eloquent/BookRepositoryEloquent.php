<?php

namespace App\Repositories\Eloquent;

use App\Models\Book;

class BookRepositoryEloquent extends BaseRepository
{
    protected $name=Book::class;

    public function paginate($limit = null, $columns = ['*'])
    {
        return $this->model->orderBy('id', 'desc')->paginate($limit);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function delete($id)
    {
        return $this->model->delete($id);
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id, $columns = ['*'])
    {
        return $this->model->find($id);
    }

    public function findBarde($barcode, $columns = ['*'])
    {
        return $this->model->where('barcode', $barcode)->get();
    }
    
    public function findBorrow($barcode, $columns = ['*'])
    {
        $book=$this->model::with(['borrow'=>function ($query) use ($barcode) {
            $query->where('returned', 2);
        }])->where('barcode', $barcode)->get();
        // return ($book[0]->borrow[0]->id);
        return $book;
    }

    public function update(array $attributes, $id)
    {
        return $this->model->find($id)->update($attributes);
    }
}
