<?php

namespace App\Http\data_access\queries\remote_professors;


use App\Http\data_access\queries\core\BaseQueries;

interface RemoteProfessorsQueries extends BaseQueries
{

    public function lessons();
    public function university();
    public function participations();
    public function students();
}