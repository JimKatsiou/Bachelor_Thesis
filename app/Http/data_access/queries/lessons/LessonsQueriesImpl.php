<?php

namespace App\Http\data_access\queries\lessons;


use App\Http\data_access\data_base_models\Lesson;
use App\Http\data_access\queries\core\BaseQueriesImpl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Exception\UnsupportedOperationException;

class LessonsQueriesImpl extends BaseQueriesImpl implements LessonsQueries
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new Lesson();
    }

    public function getArray(Model $data): array
    {

        return [
            'id' => $data->id,
            'name' => $data->name,
            'ects' => $data->ects,
            'semester' => $data->semester,
            'link' => $data->link

        ];
    }


    public function create(Model $data)
    {
        return (Lesson::create($this->getArray($data))['id']);
    }

    public function update(Model $data, $id, $attribute = "id")
    {
        Lesson::where($attribute, '=', $id)->update($this->getArray($data));
        return $data;
    }

    public function getByID($id)
    {
        $model = new Lesson();
        $model->init(Lesson::find($id)->getAttributes());
        return $model;
    }


    public function getAll()
    {
        $lessons = array();
        $arr = $this->model->get('*');
        for ($i = 0; $i < sizeof($arr); $i++) {
            $newModel = new Lesson();
            $newModel->init($arr[$i]->getAttributes());
            array_push($lessons, $newModel);
        }
        return $lessons;
    }


    public function delete($id)
    {
        // $model = $this->getByID($id);
        // dd($model->universities(),  $model->connections());
        // $remoteProfessor = $model->remoteProfessors();
        // $universities = $model->universities();
        // $connections = $model->connections();

        // dd($model, $remoteProfessor, $universities, $connections);


        // dd($id);
        return null;
    }
}
