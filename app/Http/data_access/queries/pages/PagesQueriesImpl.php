<?php

namespace App\Http\data_access\queries\lessons;


use App\Http\data_access\queries\core\BaseQueriesImpl;
use App\Http\data_access\data_base_models\Page;
use App\Http\data_access\queries\pages\PagesQueries;

class PagesQueriesImpl extends BaseQueriesImpl implements PagesQueries {

    public function __construct()
    {
        $this->model = new Page();
    }
}







