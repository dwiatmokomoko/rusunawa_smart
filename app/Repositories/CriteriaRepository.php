<?php

namespace App\Repositories;

use App\Interfaces\CriteriaInterface;
use App\Models\Criteria;

class CriteriaRepository implements CriteriaInterface
{

    private Criteria $model;

    function __construct(Criteria $model)
    {
        $this->model = $model;
    }

    // App\Repositories\CriteriaRepository.php
    public function getAllQuery()
    {
        return Criteria::query()->select('id', 'name', 'weight');
    }

    public function getAll()
    {
        return $this->model->get(["id", "name", "weight"]);
    }
    public function getById($id)
    {
        return $this->model->where(["id" => $id])->first(["id", "name", "weight"]);
    }
    public function store($data)
    {
        return $this->model->updateOrCreate(['id' => $data['id']], $data);
    }
    public function edit($id, $data)
    {
        return $this->model->whereId($id)->update($data);
    }
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
}
