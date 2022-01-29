<?php

namespace App\Http\data_access\data_transfer_models;

use App\data_access\data_transfer_models\RemoteProfessorTr;
use App\data_access\data_transfer_models\UserTr;
use Maksi\LaravelRequestMapper\Filling\RequestData\JsonRequestData;

/*
 * @ValidationClass(class="LessonTrValidator")
 */

class LessonTr extends JsonRequestData
{
    public $id = 'id';
    public $name = 'name';
    public $ects = 'ects';
    public $link = 'link';
    public $semester = 'semester';
    public $remoteProfessor = null;
    public $professor = null;
    public $university = null;


    public function init(array $data): void
    {
        $this->id = $data['id'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->ects = $data['ects'] ?? '';
        $this->link = $data['link'] ?? '';
        $this->semester = $data['semester'] ?? '';
    }
}