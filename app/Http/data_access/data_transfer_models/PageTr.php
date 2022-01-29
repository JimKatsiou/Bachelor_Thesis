<?php

namespace App\data_access\data_transfer_models;

use Illuminate\Database\Eloquent\Model;
use Maksi\LaravelRequestMapper\Filling\RequestData\AllRequestData;

class PageTr extends AllRequestData
{
    //Table Name
    protected $table = 'Page';

//TODO Fix properties here


    /**
     * @param array $data
     */
    protected function init(array $data): void
    {
        // TODO: Implement init() method.
    }
}
