<?php

namespace App\Http\data_access\data_transfer_models;
use App\Http\data_access\data_transfer_models\LessonTr;
use Maksi\LaravelRequestMapper\Filling\RequestData\AllRequestData;

class ConnectionTr extends AllRequestData
{
    public $id;
    public $degree;
    public $status;
    public $localLesson;
    public $remoteLesson;
    public $participation;


    protected function init(array $data): void
    {
        $this->id = $data['id'] ?? '';
        $this->degree = $data['degree'] ?? '';

        $inputStatus = ($data['status'] ?? null);
        if($inputStatus !== null){
            $this->status = new StatusTr($inputStatus);
        }

        $inputLocalLesson = ($data['localLesson'] ?? null);
        if($inputLocalLesson !== null){
            $this->localLesson = new LessonTr($inputLocalLesson);
        }

        $inputRemoteLesson = ($data['remoteLesson'] ?? null);
        if($inputRemoteLesson !== null){
            $this->remoteLesson = new LessonTr($inputRemoteLesson);
        }
    }
}
