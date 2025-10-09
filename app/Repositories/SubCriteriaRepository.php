<?php

namespace App\Repositories;

use App\Interfaces\SubCriteriaInterface;
use App\Models\Criteria;
use App\Models\Sub_criteria;

class SubCriteriaRepository implements SubCriteriaInterface {

    private Sub_criteria $model;

    function __construct(Sub_criteria $model) {
        $this->model = $model;
    }
    public function getAll() {
        return $this->model->with("criteria")->get(["id" ,"name", "criteria_id", "weight"]);
    }
    public function getById($id) {
        return $this->model->where(["id" => $id])->first(["id", "name", "weight"]);
    }
    public function store($data) {
        return $this->model->updateOrCreate(['id' => $data['id']], $data);
    }
    public function edit($id, $data) {
        return $this->model->whereId($id)->update($data);
    }
    public function destroy($id) {
        return $this->model->destroy($id);
    }

    function grouped() {
        return $this->model->all()->groupBy('criteria_id');
    }
}
