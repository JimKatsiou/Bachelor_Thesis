<?php

namespace App\Http\data_access\data_base_models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = ['id', 'name', 'country', 'code', 'web_site', 'recommendedSkills'];

    //Table Name
    protected $table = 'universities';

    //Primary Key
    public $id = 'id';
    public $name = 'name';
    public $country = 'country';
    public $code = 'code';
    public $web_site = 'web_site';
    public $recommendedSkills = 'recommendedSkills';
    //Timestamps
    public $timestamps = true;


    public function asArray(): array
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'country' => $this->country,
            'code' => $this->code,
            'web_site' => $this->web_site,
            'recommendedSkills' => $this->recommendedSkills
        ];
    }


    public function init(array $data): Model
    {
        $this->id = $data['id'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->country = $data['country'] ?? '';
        $this->code = $data['code'] ?? '';
        $this->web_site = $data['web_site'] ?? '';
        $this->recommendedSkills = $data['recommendedSkills'] ?? '';
        return $this;
    }

    //TODO check this connections is error or useful..
    public function participations()
    {
        return $this->belongsToMany('App\Participation', 'participation_user');
    }


    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'educate');
    }
}