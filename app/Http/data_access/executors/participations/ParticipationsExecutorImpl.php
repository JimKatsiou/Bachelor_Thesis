<?php

namespace App\Http\data_access\executors\participations;

use App\Http\data_access\configurations\ParticipationStatusType;
use App\Http\data_access\data_base_models\Participation;
use App\Http\data_access\data_transfer_models\ParticipationTr;
use App\Http\data_access\executors\connections\ConnectionsExecutor;
use App\Http\data_access\executors\participations\ParticipationsExecutor;
use App\Http\data_access\queries\participations\ParticipationsQueries;
use AutoMapperPlus\AutoMapper;
use AutoMapperPlus\Configuration\AutoMapperConfig;
use Ramsey\Uuid\Exception\UnsupportedOperationException;

class ParticipationsExecutorImpl implements ParticipationsExecutor
{

    private $queries;
    private $mapper;
    private $connectionsExecutor;

    public function __construct(ParticipationsQueries $queries, ConnectionsExecutor $connectionsExecutor)
    {
        $this->queries = $queries;
        $this->connectionsExecutor = $connectionsExecutor;


        $config = new AutoMapperConfig();
        $config->registerMapping(participationTr::class, Participation::class);
        $config->registerMapping(Participation::class, ParticipationTr::class);
        $this->mapper = new AutoMapper($config);
    }

    public function getAll()
    {
        $participationList = $this->queries->getAll();
        //$participationTrList = $this->mapper->mapMultiple($participationList, ParticipationTr::class);
        return $participationList;
    }

    public function create(ParticipationTr $participationTr)
    {

        $this->validateConnectionsStatus($participationTr->connections);

        $participation = $this->mapper->map($participationTr, Participation::class);
//        $participation->userId = 1;

        $participation->id =  $this->queries->create($participation);
        $newparticipationTr = $this->mapper->map($participation, ParticipationTr::class);

        $arrayConnections = array();
        foreach ($participationTr->connections  as $connectionTr) {
            $connectionTr->participation = $newparticipationTr;
            $newConnectionTr = $this->connectionsExecutor->create($connectionTr);
            array_push($arrayConnections, $newConnectionTr->id);
        }

        return $newparticipationTr;
    }
    public function delete($id)
    {

        throw new \Exception('Den upostirizete h medodos');
        // $participation = $this->queries->delete($id);
        // $participationTr = $this->mapper->map($participation, ParticipationTr::class);
        // return $participationTr;
    }
    public function getByID($id)
    {
        $participation = $this->queries->getByID($id);
        $participationTr = $this->mapper->map($participation, ParticipationTr::class);
        return $participationTr;
    }

    public function update($id, ParticipationTr $participationTr)
    {
        //requires more logic here as the create.
        throw new UnsupportedOperationException("Not implemented yet");

        // $participation = $this->mapper->map($participationTr, Participation::class);
        // $newParticipation = $this->queries->update($participation, $id);
        // $newParticipationTr = $this->mapper->map($newParticipation, ParticipationTr::class);
        // return $newParticipationTr;
    }




    private function validateConnectionsStatus(array $connections)
    {
        foreach ($connections  as $connection) {
            if (!ParticipationStatusType::isValid($connection->status->type)) {
                throw new UnsupportedOperationException("Invalid status type for this Connection!");
            }
        }
    }
}
