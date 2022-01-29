<?php

namespace App\Http\data_access\executors\remote_professors;



use App\data_access\data_transfer_models\RemoteProfessorTr;
use App\data_access\executors\RemoteProfessorsExecutor;
use App\Http\data_access\data_base_models\RemoteProfessor;
use App\Http\data_access\queries\remote_professors\RemoteProfessorsQueries;
use AutoMapperPlus\AutoMapper;
use AutoMapperPlus\Configuration\AutoMapperConfig;


class RemoteProfessorsExecutorImpl implements RemoteProfessorsExecutor
{
    private $queries;
    private $mapper;

    public function __construct(RemoteProfessorsQueries $queries)
    {
        $this->queries = $queries;

        $config = new AutoMapperConfig();
        $config->registerMapping(RemoteProfessorTr::class, RemoteProfessor::class);
        $config->registerMapping(RemoteProfessor::class, RemoteProfessorTr::class);
        $this->mapper = new AutoMapper($config);
    }

    public function getAll()
    {
        $lessonsList = $this->queries->getAll();
        return $lessonsList;
    }

    public function create(RemoteProfessorTr $remoteProfessorTr)
    {
        $remoteProfessor = $this->mapper->map($remoteProfessorTr, RemoteProfessor::class);
        $remoteProfessor->id = $this->queries->create($remoteProfessor);
        return $this->mapper->map($remoteProfessor, RemoteProfessorTr::class);
    }

    public function delete($id)
    {
        return $this->queries->delete($id);
    }

    public function getByID($id)
    {
        return $this->queries->getByID($id);
    }

    public function update(RemoteProfessorTr $remoteProfessorTr, $id)
    {
        $newRemoteProfessor = $this->mapper->map($remoteProfessorTr, RemoteProfessor::class);
        return $this->queries->update($newRemoteProfessor, $id);
    }
}