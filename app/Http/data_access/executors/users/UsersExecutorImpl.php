<?php

namespace App\Http\data_access\executors\users;

use App\data_access\data_transfer_models\UserTr;
use App\data_access\executors\UsersExecutor;
use App\Http\data_access\data_base_models\User;
use App\Http\data_access\data_transfer_models\TeachTr;
use App\Http\data_access\executors\lessons\LessonsExecutor;
use App\Http\data_access\queries\_users\UsersQueries;
use AutoMapperPlus\AutoMapper;
use AutoMapperPlus\Configuration\AutoMapperConfig;

class UsersExecutorImpl implements UsersExecutor
{
    private $usersQueries;
    private $lessonsExecutor;
    private $mapper;

    public function __construct(
        UsersQueries $usersQueries,
        LessonsExecutor $lessonsExecutor
    ) {
        $this->usersQueries = $usersQueries;
        $this->lessonsExecutor = $lessonsExecutor;

        $config = new AutoMapperConfig();
        $config->registerMapping(UserTr::class, User::class);
        $config->registerMapping(User::class, UserTr::class);
        $this->mapper = new AutoMapper($config);
    }

    public function getAll()
    {
        $usersList = $this->usersQueries->getAll();
        return $usersList;
    }

    public function create(UserTr $userTr)
    {

        $user = $this->mapper->map($userTr, User::class);
        if ($user->id == null) {
            $user->id = $this->usersQueries->create($user);
        }
        return;
    }


    public function delete($id)
    {
        return $this->usersQueries->delete($id);
    }


    public function getByID($id)
    {
        return $this->usersQueries->getByID($id);
    }
    public function update($id, UserTr $newUserTr)
    {
        $newUser = $this->mapper->map($newUserTr, User::class);
        //chech if newUser has role and change the role
        //else get the role from database



        return $this->usersQueries->update($newUser, $id);
    }

    public function professorStartTeachingLesson(TeachTr $teachTr)
    {
        if ($teachTr->lesson->id == null) {
            $teachTr->lesson = $this->lessonsExecutor->create($teachTr->lesson);
        }
        $user = $this->mapper->map($teachTr->user, User::class);
        $this->usersQueries->startTeachingLesson($user, $teachTr->lesson->id);
        return true;
    }

    public function professorStopTeachingLesson(TeachTr $teachTr)
    {
        $user = $this->mapper->map($teachTr->user, User::class);
        $this->usersQueries->stopTeachingLesson($user, $teachTr->lesson->id);
        return true;
    }
}
