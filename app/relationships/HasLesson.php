<?php

namespace App;

use App\Http\data_access\data_base_models\Lesson;
use App\Http\data_access\data_base_models\University;
use Illuminate\Database\Eloquent\Model;

class HasLesson extends Model
{

    protected $with = ['university', 'lesson'];

    public function universities()
    {
        return $this->belongsTo(University::class);
    }


    public function lessons()
    {
        return $this->belongsTo(Lesson::class);
    }
}