<?php

namespace App\Http\data_access\data_transfer_models;

use App\data_access\data_transfer_models\RemoteProfessorTr;
use App\data_access\data_transfer_models\UserTr;
use Maksi\LaravelRequestMapper\Filling\RequestData\JsonRequestData;

/*
 * @ValidationClass(class="LessonTrValidator")
 */

class TeachTr extends JsonRequestData
{
    public $lesson = null;
    public $user = null;
    public $dateFrom = null;
    public $dateTo = null;


    protected function init(array $data): void
    {

        $this->dateFrom = $data['dateFrom'] ?? null;
        $this->dateTo = $data['dateTo'] ?? null;

        $lesson = ($data['lesson'] ?? null);
        if ($lesson !== null) {
            $this->lesson = new LessonTr($lesson);
        }


        $user = ($data['user'] ?? null);
        if ($user !== null) {
            $this->user = new UserTr($user);
        }
    }
}