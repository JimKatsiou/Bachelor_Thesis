<?php

namespace App\Http\data_access\queries\status;

use App\data_access\data_base_models\relationships\Status;
use App\Http\data_access\queries\core\BaseQueriesImpl;
use Illuminate\Database\Eloquent\Model;

class StatusQueriesImpl extends BaseQueriesImpl implements StatusQueries
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new Status();
    }

    public function getArray(Model $data): array
    {
        return [
            'id' => $data->id,
            'comment' => $data->comment,
            'type' => $data->type
        ];
    }


    public function create(Model $data)
    {
        return (Status::create($this->getArray($data))['id']);
    }

    public function update(Model $data, $id, $attribute = "id")
    {
        Status::where($attribute, '=', $id)->update($this->getArray($data));
        return $data;
    }
}