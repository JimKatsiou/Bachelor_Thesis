<?php

namespace App\Http\data_access\executors\status;

use App\data_access\data_base_models\relationships\Status;
use App\Http\data_access\configurations\ParticipationStatusType;
use App\Http\data_access\data_transfer_models\StatusTr;
use App\Http\data_access\queries\status\StatusQueries;
use AutoMapperPlus\AutoMapper;
use AutoMapperPlus\Configuration\AutoMapperConfig;

class StatusExecutorImpl implements StatusExecutor
{
    private $statusQueries;
    private $mapper;

    public function __construct(
        StatusQueries $statusQueries
    ) {
        $this->statusQueries = $statusQueries;

        $config = new AutoMapperConfig();
        $config->registerMapping(StatusTr::class, Status::class);
        $config->registerMapping(Status::class, StatusTr::class);
        $this->mapper = new AutoMapper($config);
    }

    public function getAll()
    {
        $lessonsList = $this->lessonsQueries->getAll();
        return $lessonsList;
    }

    public function create(StatusTr $statusTr)
    {
        $statusTr->type = ParticipationStatusType::getStatus($statusTr->type);
        $status = $this->mapper->map($statusTr, Status::class);
        $status->id = $this->statusQueries->create($status);
        return $this->mapper->map($status, StatusTr::class);;
    }











    public function delete($id)
    {
        return $this->lessonsQueries->delete($id);
    }
    public function getByID($id)
    {
        $lesson = $this->lessonsQueries->getByID($id);
        return $lesson;
    }
    public function update($id, LessonTr $newLessonTr)
    {
        $newLesson = $this->mapper->map($newLessonTr, Lesson::class);
        return $this->lessonsQueries->update($newLesson, $id);
    }

    public function remoteProfessors()
    {
        throw new \ErrorException('non support');
    }
    public function universities()
    {
        throw new \ErrorException('non support');
    }
    public function teachers()
    {
        throw new \ErrorException('non support');
    }
    public function participations()
    {
        throw new \ErrorException('non support');
    }
}