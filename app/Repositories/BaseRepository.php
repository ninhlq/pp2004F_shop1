<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface {
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function get()
    {
        return $this->model->get();
    }

    public function getAll()
    {
        return $this->model->all();
    }
    
    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    public function paginate($per_page)
    {
        return $this->model->paginate($perpage);
    }

    public function create(array $array)
    {
        return $this->model->create($array);
    }

    public function save()
    {
        return $this->model->save();
    }

    public function delete()
    {
        return $this->model->delete();
    }

    public function orderBy($col, $direction)
    {
        return $this->model->orderBy($col, $direction);
    }
}
