<?php

namespace App\Http\Controllers;

use App\data_access\data_transfer_models\UserTr;
use App\data_access\executors\UsersExecutor;
use App\Http\data_access\data_transfer_models\TeachTr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    private $executor;

    public function __construct(UsersExecutor $executor)
    {
        $this->executor = $executor;
    }

    //we don't store user form here..
    //using registration

    public function index()
    {
        dd($this->executor->getAll());
    }

    public function getAll()
    {
        $users =  $this->executor->getAll();
        dd($users);
    }


    public function edit($id)
    {
        dd($this->executor->getById($id));
    }

    public function update(UserTr $userTr, $id)
    {
        dd($this->executor->update($id, $$userTr));
    }

    public function getById($id)
    {
        dd($this->executor->getByID($id));
    }

    public function delete($id)
    {
        dd($this->executor->getByID($id));
    }

    public function startTeaching(TeachTr $teachTr)
    {
        $this->executor->professorStartTeachingLesson($teachTr);
        return 'ok';
    }

    public function stopTeaching(TeachTr $teachTr)
    {
        $this->executor->professorStopTeachingLesson($teachTr);
        return 'ok';
    }
    public function my_application()
    {
        if (Auth::check())
        {
            $user = auth()->user();
            $user_id = $user->id;
            $data = DB::select('select * from application where user_id = "'.$user_id.'"');
            $app_data = DB::select('select * from app_data where user_id = "'.$user_id.'"');

            return view('my_application',['data'=>$data], ['app_data'=>$app_data]);
        }
        else
        {
            return redirect()->back();
        }
    }
}
