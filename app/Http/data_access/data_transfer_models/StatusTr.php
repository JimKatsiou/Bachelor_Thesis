<?php

namespace App\Http\data_access\data_transfer_models;

use Maksi\LaravelRequestMapper\Filling\RequestData\AllRequestData;

class StatusTr extends AllRequestData
{
    public $id;
    public $comment;
    public $type;
    public $connection;

    protected function init(array $data): void
    {
        $this->id = $data['id'] ?? '';
        $this->comment = $data['comment'] ?? '';
        $this->type = $data['type'] ?? '';

        $inputConnection = ($data['connection'] ?? null);
        if ($inputConnection !== null) {
            $this->connection = new ConnectionTr($inputConnection);
        }
    }
}