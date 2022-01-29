<?php


namespace App\data_access\executors;

use App\data_access\data_transfer_models\RemoteProfessorTr;

interface RemoteProfessorsExecutor
{

    public function getAll();
    public function create(RemoteProfessorTr $remoteProfessorTr);
    public function delete($id);
    public function getByID($id);
    public function update(RemoteProfessorTr $remoteProfessorTr, $id);
}