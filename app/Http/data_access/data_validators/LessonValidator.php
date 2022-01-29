<?php

namespace App\Http\data_access\data_validators;

//use App\Http\data_access\data_transfer_models\TransferModel;
use App\Http\data_access\data_validators\BasicValidator;
use Illuminate\Database\Eloquent\Model;

class LessonValidator implements BasicValidator
{
    //Table Name
    protected $table = 'lesson';

    //Primary Key
    public $primaryKey = 'id';
    public $name = 'name';
    public $ects = 'ects';
    public $link = 'link';
    public $semester = 'semester';
    //Timestamps
    public $timestamps = true;

    public function participations()
    {
        return $this->belongsToMany('App\Participation','participation_user');
    }

    public function universities()
    {
        return $this->belongsToMany('App\University','lesson_user');
    }


    public function remoteProfessors()
    {
        return $this->belongsToMany('App\RemoteProfessor','lesson_remoteprofessor');
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
