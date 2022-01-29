<?php

namespace App\Http\data_access\executors\participations;

use App\Http\data_access\data_transfer_models\ParticipationTr;

interface ParticipationsExecutor
{

    public function getAll();
    public function create(ParticipationTr $participationTr);
    public function delete($id);
    public function getByID($id);
    public function update($id, ParticipationTr $participationTr);


    // public function lessons();
    // public function universities();
    // public function users();

    // public function status();
    // public function remoteProfessors();
    // public function teachers();

    //TODO add complex queries here



}