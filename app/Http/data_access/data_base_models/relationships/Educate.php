<?php

namespace App\data_access\data_base_models\relationships;

use Illuminate\Database\Eloquent\Model;

class Educate extends Model
{

    protected $fillable = ['lesson_id', 'university_id'];
    //Table Name
    protected $table = 'lesson_university';
}