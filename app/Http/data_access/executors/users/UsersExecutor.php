<?php

namespace App\data_access\executors;

use App\data_access\data_transfer_models\UserTr;
use App\Http\data_access\data_transfer_models\TeachTr;

interface UsersExecutor
{
    public function getAll();
    public function create(UserTr $user);
    public function delete($id);
    public function getByID($id);
    public function update($id, UserTr $user);

    public function professorStartTeachingLesson(TeachTr $teachTr);
    public function professorStopTeachingLesson(TeachTr $teachTr);
}
