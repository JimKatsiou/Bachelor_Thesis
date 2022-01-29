<?php

namespace App\data_access\data_validators;

use App\data_access\data_transfer_models\TransferModel;
use Illuminate\Database\Eloquent\Model;

class PageValidator implements BasicValidator
{
    //Table Name
    protected $table = 'Page';

//TODO Fix properties here

//    //Primary Key
//    public $primaryKey = 'id';
//    public $name = 'name';
//    public $ects = 'ects';
//    public $link = 'link';
//    public $semester = 'semester';
//    //Timestamps
//    public $timestamps = true;


    public function validate(TransferModel $tr)
    {
        // TODO: Implement validate() method.
    }
}
