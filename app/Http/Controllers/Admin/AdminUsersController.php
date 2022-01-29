<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\data_access\data_transfer_models\UserTr;
use App\Http\data_access\data_base_models\User;
use App\data_access\executors\UsersExecutor;
use App\Http\data_access\data_transfer_models\TeachTr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

class AdminUsersController extends Controller
{
    private $executor;

    public function __construct(UsersExecutor $executor)
    {
        $this->executor = $executor;
    }

    public function index()
    {
        //Auth::user()->surname
        $users =  $this->executor->getAll();
//        dd($users);
        return view('admin.users.index',compact('users'));
//       if (Auth::user()->role == 0) {
////            if (strcmp(strval(Auth::user()->role), 'admin') == 0) {
//                if (Auth::user()->role =='admin') {
//
//                    return view('admin.users.index')->with('users', UserTr::paginate(5)); //send all our users down in a user's variable
//
//                } elseif (Auth::user()->role == 'user') {
//
//                    return view('user.create');
//                }

    }
//          }
//    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Checking if curent user is not trying to edit themselves
        if(Auth::user()->id == $id){
            return redirect()->route('admin.users.index')->with('warning' , 'Δεν μπορείς να διαγράψεις τον εαυτό σου.');
        }
        return view('admin.users.edit')->with(['user' => User::find($id), 'roles' => Role::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        if(Auth::user()->id == $id){
//            return redirect()->route('admin.user.index')->with('warning' , 'You are not allowed to edit yourself.');
//        }
//
////        $user = User::find($id);
////        $user->roles()->sync($request->roles);
//
//        return redirect()->route('admin.users.index')->with('success' , 'User has been updated.');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        if(Auth::user()->id == $id){
//            return redirect()->route('admin.users.index')->with('warning' , 'You are not allowed to delete yourself.');
//        }
//
//        //DIAGRAFI ROLES_ID APO DATABASE
//        $user = User::find($id);
//
//        if($user){
//            $user->role()->detach();
//            $user->delete();
//            return redirect()->route('admin.users.index')->with('success' , 'User has been deleted');
//        }
//
//        return redirect()->route('admin.users.index')->with('warning' , 'This user can not be deleted');
//

    }
    public function edit_user($id)
    {
        $data = DB::select('select * from users where id = ?',[$id]);
        return view('admin/edit_user',['data'=>$data[0]]);
    }
    public function update_user(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'role' => 'required',
            'email' => 'required'
        ]);

        $name = $request->input('name');
        $surname = $request->input('surname');
        $role = $request->input('role');
        $email = $request->input('email');

        DB::update('update users set name = ?, surname = ?, role = ?, email = ?  where id = ?',[$name,$surname,$role,$email,$id]);

        return redirect('admin/users')->with('message', 'Η Τροποποίηση Χρήστη έγινε με επιτυχία.');
    }
	public function professor()
    {
        return view('admin/professor');
    }
	public function add_professor(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $name = $request->input('name');
        $surname = $request->input('surname');
        $role = $request->input('role');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        $data=array('name'=>$name,'surname'=>$surname,'role'=>$role,'email'=>$email,'password'=>$password);

        DB::table('users')->insert($data);
        return redirect('/admin/users')->with('message', ' Η Προσθήκη καθηγητή έγινε με επιτυχία.');
    }
}
