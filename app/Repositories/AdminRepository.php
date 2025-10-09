<?php

namespace App\Repositories;

use App\Interfaces\AdminInterface;
use App\Models\Admin;

class AdminRepository implements AdminInterface {

    private Admin $model;

    function __construct(Admin $model) {
        $this->model = $model;
    }
    public function getAll() {
        return $this->model->get();
    }
    public function getById($id) {
        return $this->model->where(["id" => $id])->first();
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
}
