<?php

namespace App\Repositories;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\BaseRepositoryInterface;

class BaseEloquentRepository implements BaseRepositoryInterface
{
    private Builder $builder;
    private $modelClass;

    public function __construct($modelClass)
    {
        $this->modelClass = $modelClass;
        $this->builder = (new $modelClass)->newQuery();
    }

    public function all()
    {
        return $this->modelClass::all();
    }

    public function get()
    {
        return $this->builder->latest()->get();
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
    {
        return $this->builder->latest()->paginate($perPage, $columns, $pageName, $page); // Aplica latest() antes de paginar
    }

    public function where($column, $operator = null, $value = null, $boolean = 'and'): self
    {
        $this->builder->where($column, $operator, $value, $boolean);
        return $this;
    }

    public function withRelations(array $relations): self
    {
        $this->builder->with($relations);
        return $this;
    }

    public function findOrFail(int $id)
    {
        return $this->modelClass::findOrFail($id);
    }

    public function findOrFailWithRelations(int $id, array $relations)
    {
        $model = new $this->modelClass;
        return $model::with($relations)->findOrFail($id);
    }

    public function create(array $data)
    {
        return DB::transaction(function() use ($data) {
            $model = new $this->modelClass;
            return $model->create($data);
        });
    }

    public function update(int $id, array $data)
    {
        $modelInstance = $this->modelClass::findOrFail($id);
        $modelInstance->update($data);
        return $modelInstance;
    }

    public function delete(int $id)
    {
        return $this->modelClass::findOrFail($id)->delete();
    }
}
