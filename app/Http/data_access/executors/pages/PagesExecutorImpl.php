<?php

namespace App\data_access\executors\implementation;

use App\data_access\executors\PagesExecutor;
use App\data_access\data_base_models\Page;
use App\data_access\data_transfer_models\PageTr;
use App\data_access\queries\core\BaseQueries;

class PagesExecutorImpl implements PagesExecutor
{
    public function __construct(BaseQueries $queries)
    {

    }

    public function getAll()
    {
        return $queries->all();
    }

    public function create(PageTr $page)
    {
        throw new \ErrorException('non support');
        //$queries->create($page); // den einai tr
    }

    public function delete($id)
    {
        throw new \ErrorException('non support');
    }

    public function getByID($id)
    {
        throw new \ErrorException('non support');
    }

    public function getByType($type)
    {
        throw new \ErrorException('non support');
    }

    public function update($id,PageTr $page)
    {
        throw new \ErrorException('non support');
    }

}







