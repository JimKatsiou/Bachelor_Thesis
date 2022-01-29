<?php

namespace App\Http\data_access\executors\universities;

use App\Http\data_access\data_base_models\University;
use App\Http\data_access\data_transfer_models\UniversityTr;
use App\Http\data_access\queries\universities\UniversitiesQueries;
use App\Http\data_access\executors\universities\UniversitiesExecutor;
use AutoMapperPlus\AutoMapper;
use AutoMapperPlus\Configuration\AutoMapperConfig;
//use AutoMapperPlus\Configuration\AutoMapperConfig;
//use AutoMapperPlus\AutoMapper;


class UniversitiesExecutorImpl implements UniversitiesExecutor
{

    private $UniversityQueries;
    private $mapper;

    public function __construct(UniversitiesQueries $UniversityQueries)
    {
        $this->UniversityQueries = $UniversityQueries;

        $config = new AutoMapperConfig();
        $config->registerMapping(UniversityTr::class, University::class);
        $config->registerMapping(University::class, UniversityTr::class);
        $this->mapper = new AutoMapper($config);
    }
    public function getAll()
    {
        $universitiesList = $this->UniversityQueries->getAll();
        //$universityTrList = $this->mapper->mapMultiple($universityList, UniversityTr::class);
        return $universitiesList;
    }
    public function create(UniversityTr $universityTr)
    {
        $university = $this->mapper->map($universityTr, University::class);
        $university->id = $this->UniversityQueries->create($university);
        return $this->mapper->map($university, UniversityTr::class);
    }
    public function update($id, UniversityTr $newUniversityTr)
    {
        $newUniversity = $this->mapper->map($newUniversityTr, University::class);
        return $this->UniversityQueries->update($newUniversity, $id);
    }

    public function getByID($id)
    {
        $university = $this->UniversityQueries->getByID($id);
        return $university;
    }

    public function delete($id)
    {
        return $this->UniversityQueries->delete($id);
        //return null;
    }

}
