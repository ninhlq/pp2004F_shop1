<?php

namespace App\Repositories;

interface RepositoryInterface {

    public function get();

    public function getAll();
    
    public function find($id);

    public function findOrFail($id);

    public function paginate($per_page);

    public function create(array $array);

    public function save();

    public function delete();

    public function orderBy($col, $direction);
}
