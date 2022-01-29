<?php

namespace App\Http\data_access\queries\universities;

use App\Http\data_access\data_base_models\University;
use App\Http\data_access\queries\core\BaseQueriesImpl;
use Illuminate\Database\Eloquent\Model;

class UniversitiesQueriesImpl extends BaseQueriesImpl implements UniversitiesQueries
{

    public function __construct()
    {
        $this->model = new University();
    }

    public function getArray(Model $data): array
    {


        return [
            'id' => $data->id,
            'name' => $data->name,
            'country' => $data->country,
            'code' => $data->code,
            'web_site' => $data->web_site,
            'recommendedSkills' => $data->recommendedSkills,
        ];
    }




    public function create(Model $data)
    {
        return \App\Http\data_access\data_base_models\University::create($this->getArray($data))['id'];
    }

    public function update(Model $data, $id, $attribute = "id")
    {
        \App\Http\data_access\data_base_models\University::where($attribute, '=', $id)->update($this->getArray($data));
        return $data;
    }

    public function getByID($id)
    {
        $model = new University();
        $model->init(University::find($id)->getAttributes());
        return $model;
    }

    public function getAll()
    {
        $models = array();
        $arr = $this->model->get('*');
        for ($i = 0; $i < sizeof($arr); $i++) {
            $newModel = new University();
            $newModel->init($arr[$i]->getAttributes());
            array_push($models, $newModel);
        }
        return $models;
    }

    public function delete($id)
    {
        dd($id);
    }
}