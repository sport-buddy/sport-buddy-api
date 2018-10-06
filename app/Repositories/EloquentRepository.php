<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder as Query;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class EloquentRepository
{
    /**
     * @var Model
     */
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function findAll(): Collection
    {
        return $this->query()->get();
    }

    public function create(array $fields): Model
    {
        return $this->query()->create($fields);
    }

    protected function query(): Query
    {
        return $this->model->query();
    }
}
