<?php
//SAN ADMIN NA MPOREI NA ALLASKEI SE APLO USER OSTE NA DEI TI VLEPEI AYTOS NA KATALABEI TO PROVLIMA
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\data_access\data_transfer_models\UserTr;
use App\data_access\executors\UsersExecutor;
use App\Http\data_access\data_base_models\User;
use App\Http\data_access\data_transfer_models\TeachTr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class AdminImpersonateController extends Controller
{
    public function index($id){

        //$user = User::where('id' , $id)->first();
        $user = DB::SELECT('select * from users where id = ?',[$id]);
        if($user){
            session()->put('impersonate' , $id);
        }

        return redirect('/home')->with('message', 'User Is Impersonate.');
        //an paei na kanei kapoios impersonate kai den einai admin den to afinei

    }

    public function destroy(){

        session()->forget('impersonate');

        return redirect('/home');
    }
	
	public function admin_delete_user($id) 
    {
        DB::delete('delete from users where id = ?',[$id]);
        return redirect()->back()->with('message', 'User Delete Successfully.');
    }
}
