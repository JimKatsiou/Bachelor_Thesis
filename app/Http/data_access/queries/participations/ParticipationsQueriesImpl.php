<?php

namespace App\Http\data_access\queries\participations;


use App\Http\data_access\data_base_models\Participation;
use App\Http\data_access\queries\core\BaseQueriesImpl;
use Illuminate\Database\Eloquent\Model;
//use App\Http\data_access\queries\participations\ParticipationsQueries;

class ParticipationsQueriesImpl extends BaseQueriesImpl implements ParticipationsQueries
{


    public function __construct()
    {
        parent::__construct();
        $this->model = new Participation();
    }

    public function getArray(Model $data): array
    {
        return [
            'id' => $data->id,
            'year' => $data->year,
            'semester' => $data->semester,
            'user_id' => $data->userId
        ];
    }


    public function create(Model $data)
    {

        return (Participation::create($this->getArray($data))['id']);
        // return $data;
    }

    public function update(Model $data, $id, $attribute = "id")
    {
        \App\Http\data_access\data_base_models\Lesson::where($attribute, '=', $id)->update($this->getArray($data));
        return $data;
    }
    public function lessons()
    {
        // TODO: Implement lessons() method.
    }

    public function universities()
    {
        // TODO: Implement universities() method.
    }

    public function users()
    {
        // TODO: Implement users() method.
    }

    public function status()
    {
        // TODO: Implement status() method.
    }

    public function remoteProfessors()
    {
        // TODO: Implement remoteProfessors() method.
    }

    public function teachers()
    {
        // TODO: Implement teachers() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function getByID($id)
    {
        // TODO: Implement getByID() method.
    }
}
