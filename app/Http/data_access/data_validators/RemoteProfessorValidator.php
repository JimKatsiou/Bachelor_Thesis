<?php

namespace App\data_access\data_validators;

use App\data_access\data_transfer_models\TransferModel;
use Illuminate\Database\Eloquent\Model;

class RemoteProfessorValidator implements BasicValidator
{
    //Table Name
    protected $table = 'remoteprofessor';

    //Primary Key
    public $primaryKey = 'id';
    public $name = 'name';
    public $surname = 'surname';
    //Timestamps
    public $timestamps = true;



    public function lessons()
    {
        return $this->belongsToMany('App\Lesson','lesson_remoteprofessor');
    }


    public function validate(TransferModel $tr)
    {
        // TODO: Implement validate() method.
    }
}
