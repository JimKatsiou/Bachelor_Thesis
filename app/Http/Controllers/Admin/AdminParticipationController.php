<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

//use App\User;

use App\data_access\data_transfer_models\UserTr;
use App\data_access\executors\UsersExecutor;
use App\Http\data_access\data_transfer_models\TeachTr;
use App\Http\data_access\data_transfer_models\ParticipationTr;
use App\Http\data_access\data_base_models\Participation;
use App\Http\data_access\executors\participations\ParticipationsExecutor;

//use App\Participation;

use Illuminate\Support\Facades\DB;


class AdminParticipationController extends Controller
{
    protected $executor;
    protected $validator;



    public function __construct(ParticipationsExecutor $executor)
    {
        $this->executor = $executor;
    }

    public function index()
    {
        //$participations =  $this->executor->getAll();
        //dd($participations);
        $data = DB::select('select * from application');
        $app_data = DB::select('select * from app_data' );
        return view('admin.pages.participationslist',['data'=>$data],['app_data'=>$app_data]);
    }

    public function index2($id)
    {

        //SELECT * FROM PART.... WHERE id = id (parametros);
        //return view (...) ->with(participations' , $participations);
//        $participations = DB::select('select * from application where id = ?',[$id]);
        $participations = DB::select('select * from application');
        $app_data = DB::select('select * from app_data where id = ?',[$id]);
        return view('admin.pages.participations',['participations'=>$participations[0]],['app_data'=>$app_data[0]]);
//        $participations[0],
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }


    public function edit($id)
    {
        //Checking if curent user is not trying to edit themselves
        if(Auth::user()->id == $id){
            return redirect()->route('admin.users.index')->with('warning' , 'You are not allowed to edit yourself.');
        }
        return view('admin.users.edit')->with(['user' => User::find($id), 'roles' => Role::all()]);
    }


    public function update(Request $request, $id)
    {
        if(Auth::user()->id == $id){
            return redirect()->route('admin.user.index')->with('warning' , 'You are not allowed to edit yourself.');;
        }

        $user = User::find($id);
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')->with('success' , 'User has been updated.');
    }

    public function destroy($id)
    {
    }

    public function status_update($id,$status)
    {
        DB::update('update app_data set status = ? where id = ?',[$status,$id]);
        return redirect()->back()->with('message', 'Status Update Successfully.');
    }

	public function impersonate_user($id,$role)
    {
        DB::update('update users set role = ? where id = ?',[$role,$id]);
        return redirect()->back()->with('message', 'User Impersonate Successfully.');
    }

}

