<?php


namespace App\Http\data_access\executors\connections;

use App\Http\data_access\data_transfer_models\ConnectionTr;

interface ConnectionsExecutor
{

    public function create(ConnectionTr $connection);
    public function update($id, ConnectionTr $connectionTr);
}