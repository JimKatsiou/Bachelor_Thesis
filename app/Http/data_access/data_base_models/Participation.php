<?php

namespace App\Http\data_access\data_base_models;

use App\Http\data_access\data_base_models\relationships\Connection;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    protected $table = 'participations';
    protected $fillable = ['id', 'year', 'user_id', 'semester'];

    public $primaryKey = 'id';
    public $id = 'id';
    public $year = 'year';
    public $semester = 'semester';
    public $userId = null;
    public $timestamps = true;

    public function asArray(): array
    {

        return [
            'id' => $this->id,
            'year' => $this->year,
            'semester' => $this->semester,
            'user_id' => $this->userId
        ];
    }



    public function users()
    {
        return $this->hasOne(User::class);
    }


    public function connections()
    {
        return $this->hasMany(Connection::class);
    }
}