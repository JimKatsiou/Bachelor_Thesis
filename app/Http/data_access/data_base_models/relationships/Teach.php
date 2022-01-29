<?php

namespace App\data_access\data_base_models\relationships;

use App\Http\data_access\data_base_models\Lesson;
use App\Http\data_access\data_base_models\User;
use Illuminate\Database\Eloquent\Model;

class Teach extends Model
{

    protected $table = 'teaches';
    protected $fillable = ['id' , 'lesson_id' , 'user_id'];

    public $primaryKey = 'id';
    public $id;
    public $timestamps = true;


    public function asArray(): array
    {
        return [
            'id' => $this->id,
        ];
    }


    public function user()
    {
        return $this->hasOne(User::class, 'foreign_key', 'user_id');
    }

    public function lesson()
    {
        return $this->hasOne(Lesson::class, 'foreign_key', 'lesson_id');
    }
}
