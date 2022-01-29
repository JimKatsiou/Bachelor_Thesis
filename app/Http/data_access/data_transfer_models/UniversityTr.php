<?php

namespace App\Http\data_access\data_transfer_models;


use Maksi\LaravelRequestMapper\Filling\RequestData\AllRequestData;

class UniversityTr extends AllRequestData
{
    //Table Name
    protected $table = 'university';

    //Primary Key
    public $primaryKey = 'id';
    public $id = 'id';
    public $name = 'name';
    public $country = 'country';
    public $code = 'code';
    public $web_site = 'web_site';
    public $recommendedSkills = 'recommendedSkills';
    //Timestamps
    public $timestamps = true;

    public function init(array $data): void
    {


        $this->id = $data['id'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->country = $data['country'] ?? '';
        $this->code = $data['code'] ?? '';
        $this->web_site = $data['web_site'] ?? '';
        $this->recommendedSkills = $data['recommendedSkills'] ?? '';
    }
}