<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    public function all($columns = ['*']);
    
    public function paginate($limit = null, $columns = ['*']);

    public function create(array $attributes);

    public function update(array $attributes, $id);

    public function delete($id);
    
    public function destroy($id);

    public function find($id, $columns = ['*']);
}
