<?php

namespace App\data_access\data_base_models\relationships;

use App\Http\data_access\data_base_models\relationships\Connection;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    protected $fillable = ['id', 'comment', 'type'];
    //Table Name
    protected $table = 'status';
    //Primary Key
    public $primaryKey = 'id';

    public $id;
    public $comment;
    public $type;
    //Timestamps
    public $timestamps = true;



    public function asArray(): array
    {
        return [
            'id' => $this->id,
            'comment' => $this->comment,
            'type' => $this->type
        ];
    }

    public function connection()
    {
        return $this->hasOne(Connection::class);
    }
}