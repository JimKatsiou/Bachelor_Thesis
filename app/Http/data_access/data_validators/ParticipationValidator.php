<?php

namespace App\Http\data_access\data_validators;

use App\Http\data_access\data_transfer_models\TransferModel;
use Illuminate\Database\Eloquent\Model;

class ParticipationValidator implements BasicValidator
{
    //Table Name
    protected $table = 'participation';

    //Primary Key
    public $primaryKey = 'id';
    public $year = 'year';
    public $semester = 'semester';
    //Timestamps
    public $timestamps = true;



    public function lessons()
    {
        return $this->belongsToMany('App\Lesson','participation_user');
    }

    public function universities()
    {
        return $this->belongsToMany('App\University','lesson_user');
    }


    public function users()
    {
        return $this->belongsToMany('App\User','lesson_user');
    }

    public function validate(TransferModel $tr)
    {
        // TODO: Implement validate() method.
    }
}


