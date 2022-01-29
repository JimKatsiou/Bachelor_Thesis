<?php

namespace App\Http\data_access\queries\connections;

use App\Http\data_access\data_base_models\relationships\Connection;
use App\Http\data_access\queries\core\BaseQueriesImpl;
use App\Http\data_access\queries\lessons\ConnectionsQueries;
use Illuminate\Database\Eloquent\Model;

class ConnectionsQueriesImpl extends BaseQueriesImpl implements ConnectionsQueries
{
    public function delete($id)
    {
        throw new \Exception('Den upostirizete h medodos');
    }

    public function getByID($id)
    {
        throw new \Exception('Den upostirizete h medodos akoma');
    }

    public function __construct()
    {
        parent::__construct();
        $this->model = new Connection();
    }

    public function getArray(Model $data): array
    {

        return [
            'id' => $data->id,
            'degree' => $data->degree,
            'status' => $data->status,
            'participation_id' => $data->participation_id,
            'status_id' => $data->status_id,
            'remote_lesson_id' => $data->remote_lesson_id,
            'uop_lesson_id' => $data->uop_lesson_id
        ];
    }


    public function create(Model $data)
    {
        return (Connection::create($this->getArray($data))['id']);
    }

    public function update(Model $data, $id, $attribute = "id")
    {
        Connection::where($attribute, '=', $id)->update($this->getArray($data));
        return $data;
    }
}
