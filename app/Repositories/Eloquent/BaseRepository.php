<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    protected $name;
    protected $model;

    public function __construct()
    {
        $this->model=App($this->name);
    }

    public function all($columns = ['*'])
    {
        return $this->model->get();
    }
    
    public function paginate($limit = null, $columns = ['*'])
    {
        return $this->model->paginate($limit);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes, $id)
    {
        return $this->model->find($id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
    
    public function find($id, $columns = ['*'])
    {
        return $this->model->find($id);
    }
}
