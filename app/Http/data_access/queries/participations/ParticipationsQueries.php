<?php


namespace App\Http\data_access\queries\participations;


use App\Http\data_access\queries\core\BaseQueries;

interface ParticipationsQueries extends BaseQueries{

    public function lessons();
    public function universities();
    public function users();

    public function status();
    public function remoteProfessors();
    public function teachers();

    //TODO add complex queries here



}







