<?php

namespace App\Http\data_access\data_validators;

use App\data_access\data_transfer_models\TransferModel;
use Illuminate\Database\Eloquent\Model;

class UniversityValidator implements BasicValidator
{
     //Table Name
     protected $table = 'university';

     //Primary Key
     public $primaryKey = 'id';
     public $name = 'name';
     public $country = 'country';
     public $code = 'code';
     public $web_site = 'web_site';
     public $recommendedSkills = 'recommendedSkills';
     //Timestamps
     public $timestamps = true;


    //TODO check this connections is error or useful..
    public function participations()
    {
        return $this->belongsToMany('App\Participation','participation_user');
    }


    public function lessons()
    {
        return $this->belongsToMany('App\Lesson','lesson_user');
    }


    public function validate(TransferModel $tr)
    {
        // TODO: Implement validate() method.
    }
}
