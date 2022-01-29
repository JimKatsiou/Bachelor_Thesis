<?php

namespace App\Http\data_access\data_base_models\relationships;

use App\data_access\data_base_models\relationships\Status;
use App\Http\data_access\data_base_models\Lesson;
use App\Http\data_access\data_base_models\Participation;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    protected $table = 'connections';
    protected $fillable = ['id', 'degree', 'participation_id', 'remote_lesson_id', 'uop_lesson_id', 'status_id'];

    public $primaryKey = 'id';
    public $id;
    public $participation_id;
    public $remote_lesson_id;
    public $uop_lesson_id;
    public $status_id;
    public $degree;
    public $timestamps = true;


    public function asArray(): array
    {
        return [
            'id' => $this->id,
            'degree' => $this->degree,
            'participation_id' => $this->participation_id,
            'remote_lesson_id' => $this->remote_lesson_id,
            'status_id' => $this->status_id,
            'uop_lesson_id' => $this->uop_lesson_id
        ];
    }


    public function participation()
    {
        return $this->hasOne(Participation::class, 'foreign_key', 'participation_id');
    }


    public function status()
    {
        return $this->hasOne(Status::class, 'foreign_key', 'status_id');
    }

    public function remoteLesson()
    {
        return $this->hasOne(Lesson::class, 'foreign_key', 'remote_lesson_id');
    }


    public function uopLesson()
    {
        return $this->hasOne(Lesson::class, 'foreign_key', 'uop_lesson_id');
    }
}