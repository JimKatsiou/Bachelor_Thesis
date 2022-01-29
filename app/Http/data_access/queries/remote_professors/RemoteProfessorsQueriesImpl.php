<?php

namespace App\Http\data_access\queries\remote_professors;




use App\Http\data_access\data_base_models\RemoteProfessor;
use App\Http\data_access\queries\core\BaseQueriesImpl;
use Illuminate\Database\Eloquent\Model;

class RemoteProfessorsQueriesImpl extends BaseQueriesImpl implements RemoteProfessorsQueries
{


    public function __construct()
    {
        $this->model = new RemoteProfessor();
    }

    public function getArray(Model $data): array
    {

        return [
            'id' => $data->id,
            'name' => $data->name,
            'surname' => $data->surname
        ];
    }

    public function create(Model $data)
    {
        return (\App\Http\data_access\data_base_models\RemoteProfessor::create($this->getArray($data))['id']);
    }

    public function update(Model $data, $id, $attribute = "id")
    {
        \App\Http\data_access\data_base_models\RemoteProfessor::where($attribute, '=', $id)->update($this->getArray($data));
        return $data;
    }

    public function getByID($id)
    {
        return RemoteProfessor::find($id);
    }

    public function delete($id)
    {
        dd($id);
    }


    public function lessons()
    {
        // TODO: Implement lessons() method.
    }

    public function university()
    {
        // TODO: Implement university() method.
    }

    public function participations()
    {
        // TODO: Implement participations() method.
    }

    public function students()
    {
        // TODO: Implement students() method.
    }
}