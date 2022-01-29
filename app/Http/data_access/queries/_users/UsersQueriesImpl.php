<?php

namespace App\Http\data_access\queries\_users;

use App\Http\data_access\data_base_models\User;
use App\Http\data_access\queries\core\BaseQueriesImpl;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersQueriesImpl extends BaseQueriesImpl implements UsersQueries
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new User();
    }

    public function getArray(Model $data): array
    {

        return [

            'id' => $data->id,
            "name" => $data->name,
            "surname" => $data->surname,
            "role" => $data->role,
            "email" => $data->email,
            "password" => $data->password,
            "am" => $data->am,
            "language" => $data->language,
            "remeber_token" => $data->remeber_token
        ];
    }


    public function create(Model $data)
    {
        return (User::create($this->getArray($data))['id']);
    }

    public function update(Model $data, $id, $attribute = "id")
    {
        User::where($attribute, '=', $id)->update($this->getArray($data));
        return $data;
    }

    public function getByID($id)
    {
        $model = new User();
        $model->init(User::find($id)->getAttributes());
        return $model;
    }

    public function getAll()
    {
        $users = array();
        $arr = $this->model->get('*');
        for ($i = 0; $i < sizeof($arr); $i++) {
            $newModel = new User();
            $newModel->init($arr[$i]->getAttributes());
            array_push($users, $newModel);
        }
        return $users;
    }



    public function startTeachingLesson(User $user, $lesson_id)
    {
        $user->lessons()
            ->sync($lesson_id, 'teaches', ['dateFrom' => new DateTime(), 'dateTo' => null]);
        return true;
    }


    public function stopTeachingLesson(User $user, $lesson_id)
    {
        DB::table('teaches')
            ->where('lesson_id', $lesson_id)
            ->where('user_id', $user->id)
            ->update(['date_to' => new DateTime()]);

        return true;
    }

    public function participations()
    {
        // TODO: Implement participations() method.
    }

    public function lessons()
    {
        // TODO: Implement lessons() method.
    }

    public function university()
    {
        // TODO: Implement university() method.
    }

    public function updateRole(User $user, $role)
    {
        // TODO: Implement updateRole() method.
    }
}
