<?php

namespace App\Repositories\Eloquent;

use App\Models\BookCase;

class BookCaseRepositoryEloquent extends BaseRepository
{
    protected $name=BookCase::class;

    public function all($columns = ['*'])
    {
        return $this->model->all();
    }

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

    public function update(array $attributes, $id)
    {
        return $this->model->find($id)->update($attributes);
    }
}
