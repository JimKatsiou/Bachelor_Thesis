<?php


namespace App\Http\data_access\queries\_users;

use App\Http\data_access\data_base_models\User;
use App\Http\data_access\queries\core\BaseQueries;

interface UsersQueries extends BaseQueries
{

    public function participations();
    public function lessons();
    public function university();

    public function startTeachingLesson(User $user, $lesson_id);
    public function stopTeachingLesson(User $user, $lesson_id);

    public function updateRole(User $user, $role);
}