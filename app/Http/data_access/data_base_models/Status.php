<?php

namespace App\data_access\data_base_models;

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
}