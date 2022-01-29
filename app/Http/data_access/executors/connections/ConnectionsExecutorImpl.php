<?php

namespace App\Http\data_access\executors\connections;

use App\Http\data_access\data_base_models\relationships\Connection;
use App\Http\data_access\data_transfer_models\ConnectionTr;
use App\Http\data_access\data_transfer_models\LessonTr;
use App\Http\data_access\executors\connections\ConnectionsExecutor;
use App\Http\data_access\executors\lessons\LessonsExecutor;
use App\Http\data_access\executors\status\StatusExecutor;
use App\Http\data_access\queries\lessons\ConnectionsQueries;
use AutoMapperPlus\AutoMapper;
use AutoMapperPlus\Configuration\AutoMapperConfig;


class ConnectionsExecutorImpl implements ConnectionsExecutor
{
    private $connectionsQueries;
    private $lessonsExecutor;
    private $statusExecutor;
    private $mapper;

    public function __construct(
        LessonsExecutor $lessonsExecutor,
        ConnectionsQueries $connectionsQueries,
        StatusExecutor $statusExecutor

    ) {
        $this->connectionsQueries = $connectionsQueries;
        $this->lessonsExecutor = $lessonsExecutor;
        $this->statusExecutor = $statusExecutor;

        $config = new AutoMapperConfig();
        $config->registerMapping(ConnectionTr::class, Connection::class);
        $config->registerMapping(Connection::class, ConnectionTr::class);
        $this->mapper = new AutoMapper($config);
    }

    public function create(ConnectionTr $connectionTr)
    {
        $remoteLesson = $this->addIfLessonIfNotExist($connectionTr->remoteLesson);
        $localLesson = $this->addIfLessonIfNotExist($connectionTr->localLesson);
        $status = $this->statusExecutor->create($connectionTr->status);

        $connection = $this->mapper->map($connectionTr, Connection::class);
        $connection->status_id = $status->id;
        $connection->remote_lesson_id = $remoteLesson->id;
        $connection->uop_lesson_id = $localLesson->id;
        $connection->participation_id = $connectionTr->participation->id;

        if ($connection->id == null) {
            $connection->id = $this->connectionsQueries->create($connection);
        }
        return true;
    }


    public function update($id, ConnectionTr $connectionTr)
    {
        //requires more logic here as the create.
        return null;

        // $participation = $this->mapper->map($participationTr, Participation::class);
        // $newParticipation = $this->queries->update($participation, $id);
        // $newParticipationTr = $this->mapper->map($newParticipation, ParticipationTr::class);
        // return $newParticipationTr;
    }





    private function addIfLessonIfNotExist(LessonTr $modelTr)
    {
        if ($modelTr->id == null) {
            $modelTr = $this->lessonsExecutor->create($modelTr);
        }
        return $modelTr;
    }
}