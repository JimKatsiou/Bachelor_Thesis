<?php


namespace App\Http\data_access\queries\core;


//use function app;
use App\Http\data_access\queries\core\BaseQueries;

abstract class BaseQueriesImpl implements BaseQueries
{

    public function delete($id)
    {
        throw new \Exception('Den upostirizete h medodos');
    }

    public function getByID($id)
    {
        throw new \Exception('Den upostirizete h medodos');
    }
    protected $model;

    public function __construct()
    {
    }



    public function find($id, $columns = array('*'))
    {
        return dd($this->model::find($id, $columns));
    }

    public function findBy($attribute, $value, $columns = array('*'))
    {
        return dd($this->model->where($attribute, '=', $value)->first($columns));
    }

    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->paginate($perPage, $columns);
    }


    public function getAll()
    {
        return dd($this->model->all());
    }
}
