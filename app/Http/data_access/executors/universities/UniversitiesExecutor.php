<?php


namespace App\Http\data_access\executors\universities;

use App\Http\data_access\data_transfer_models\UniversityTr;

interface UniversitiesExecutor
{

    public function getAll();
    public function create(UniversityTr $universityTr);
    public function delete($id);
    public function getByID($id);
    public function update($id, UniversityTr $universityTr);
}