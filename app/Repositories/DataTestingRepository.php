<?php

namespace App\Repositories;

use App\Interfaces\DataTestingInterface;
use App\Models\Data_training;

class DataTestingRepository implements DataTestingInterface {

    private Data_training $model;

    function __construct(Data_training $model) {
        $this->model = $model;
    }
    function getDataTraining()  {
        return $this->model->where("status", 0)->get();
    }
    function getDataTesting()  {
        return $this->model->where("status", 1)->get();
    }
    public function getAll() {
        // return $this->model->with("criteria")->get(["id" ,"name", "criteria_id", "weight"]);
    }
    public function getById($id) {
        // return $this->model->where(["id" => $id])->first(["id", "name", "weight"]);
    }
    public function store($data) {
        // return $this->model->updateOrCreate(['id' => $data['id']], $data);
    }
    public function edit($id, $data) {
        // return $this->model->whereId($id)->update($data);
    }
    public function destroy($id) {
        // return $this->model->destroy($id);
    }

    function grouped() {
        return $this->model->all()->groupBy('criteria_id');
    }
}
