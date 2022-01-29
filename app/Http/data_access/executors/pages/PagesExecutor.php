<?php


namespace App\data_access\executors;

use App\data_access\data_transfer_models\PageTr;

interface PagesExecutor{

    public function getAll();
    public function create(PageTr $page);
    public function delete($id);
    public function getByID($id);
    public function getByType($type);
    public function update($id,PageTr $page);






}







