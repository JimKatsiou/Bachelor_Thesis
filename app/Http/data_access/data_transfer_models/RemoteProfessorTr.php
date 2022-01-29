<?php

namespace App\data_access\data_transfer_models;

use App\Http\data_access\data_transfer_models\LessonTr;
use Maksi\LaravelRequestMapper\Filling\RequestData\JsonRequestData;

class RemoteProfessorTr extends JsonRequestData
{
    public $primaryKey = 'id';
    public $id = 'id';
    public $name = 'name';
    public $surname = 'surname';
    public $lessonsTr = null;


    protected function init(array $data): void
    {
        $this->id = $data['id'] ?? '';
        $this->surname = $data['surname'] ?? '';
        $this->name = $data['name'] ?? '';

        $lessonsArray = ($data['lessons'] ?? null);
        if ($lessonsArray === null) {
            return;
        }

        $this->lessonsTr = array();
        foreach ($lessonsArray as $l) {
            array_push($this->lessonsTr, new LessonTr($l));
        }
    }
}