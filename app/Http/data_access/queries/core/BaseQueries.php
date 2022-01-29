<?php


namespace App\Http\data_access\queries\core;

use Illuminate\Database\Eloquent\Model;

interface BaseQueries
{

    public function getAll();
    public function create(Model $model);
    public function delete($id);
    public function getByID($id);
    public function update(Model $model, $id);
    public function getArray(Model $data);
}