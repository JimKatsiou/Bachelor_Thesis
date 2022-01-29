<?php

namespace App\Http\data_access\data_base_models;

use Illuminate\Database\Eloquent\Model;

class RemoteProfessor extends Model
{
    protected $fillable = ['id', 'name', 'surname'];
    //Table Name
    protected $table = 'remoteprofessors';

    //Primary Key
    public $primaryKey = 'id';
    public $id = 'id';
    public $name = 'name';
    public $surname = 'surname';
    //Timestamps
    public $timestamps = true;



    public function init(array $data): Model
    {
        $this->id = $data['id'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->surname = $data['surname'] ?? '';
        return $this;
    }


    // public function lessons()
    // {
    //     return $this->belongsToMany('App\Http\data_access\data_base_models\Lesson', 'lesson_remoteprofessor');
    // }
}