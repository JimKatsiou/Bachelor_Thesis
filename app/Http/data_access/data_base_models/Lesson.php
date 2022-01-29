<?php


namespace App\Http\data_access\data_base_models;

use App\Http\data_access\data_base_models\relationships\Connection;
use App\Http\data_access\data_transfer_models\UniversityTr;
use ErrorException;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lesson extends Model
{


    protected $fillable = ['id', 'name', 'ects', 'link', 'semester'];
    //Table Name
    protected $table = 'lessons';
    //Primary Key
    public $primaryKey = 'id';

    public $id;
    public $name;
    public $ects;
    public $link;
    public $semester;
    //Timestamps
    public $timestamps = true;


    public function asArray(): array
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'ects' => $this->ects,
            'semester' => $this->semester,
            'link' => $this->link,
        ];
    }



    public function init(array $data): Model
    {
        $this->id = $data['id'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->ects = $data['ects'] ?? '';
        $this->link = $data['link'] ?? '';
        $this->semester = $data['semester'] ?? '';

        return $this;
    }

    public function connections()
    {
        $models = array();
        $arr = $this->hasMany(Connection::class, "uop_lesson_id", "id")->get()->toArray();
        for ($i = 0; $i < sizeof($arr); $i++) {
            $rm = new RemoteProfessor();
            return $rm->init($arr[$i]);
            array_push($models, $rm);
        }

        $arr = $this->hasMany(Connection::class, "remote_lesson_id", "id")->get()->toArray();
        for ($i = 0; $i < sizeof($arr); $i++) {
            $rm = new RemoteProfessor();
            return $rm->init($arr[$i]);
            array_push($models, $rm);
        }

        return $models;
    }


    public function universities()
    {
        $models = array();
        $arr = $this->belongsToMany(University::class, 'lesson_university')->get()->toArray();
        for ($i = 0; $i < sizeof($arr); $i++) {
            $u = new University();
            $u->init($arr[$i]);
            array_push($models, $u);
        }
        return $models;
    }


    public function remoteProfessors()
    {
        $models = array();
        $arr = $this->belongsToMany(RemoteProfessor::class, 'lesson_remoteprofessor')->get()->toArray();
        for ($i = 0; $i < sizeof($arr); $i++) {
            $rm = new RemoteProfessor();
            $rm->init($arr[$i]);
            array_push($models, $rm);
        }
        return $models;
    }

    public function teachers()
    {

        $models = array();
        $arr = $this->belongsToMany(User::class, 'teaches')->get()->toArray();
        for ($i = 0; $i < sizeof($arr); $i++) {
            $u = new User();
            $u->init($arr[$i]);
            array_push($models, $u);
        }
        return $models;
    }
}