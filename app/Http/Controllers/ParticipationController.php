<?php

namespace App\Http\Controllers;


use App\Http\data_access\data_transfer_models\ParticipationTr;
use App\Http\data_access\executors\participations\ParticipationsExecutor;

//use App\Http\data_access\data_base_models\Lesson;
//use App\Http\data_access\data_base_models\University;
//use App\Http\data_access\data_transfer_models\UniversityTr;
//use App\Http\data_access\executors\universities\UniversitiesExecutor;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class ParticipationController extends Controller
{

    protected $executor;
//    protected $executor1;
    protected $validator;



    public function __construct(ParticipationsExecutor $executor)
    {
        $this->executor = $executor;
//        $this->executor1 = $executor1;

    }

    public function index()
    {
//        $universities = $this->executor->getAll();
        $data = DB::select('select * from universities where display = 0');
        $course = DB::select('select * from lessons where display = 0');
        $professor = DB::select('select * from users where role != 2 ');
        return view('participations.testform',['data'=>$data,'course'=>$course ,'professor'=>$professor]);
    }

    public function store(Request $request)
    {
        //$this->executor->create($participationTr);
        //return 'ok';
        // return  redirect('partitipation')->with('success', 'Data Added');
        request()->validate([
            'name' => 'required',
            'LastName' => 'required',
            'AM' => 'required',
            'Mail' => 'required',
            'Etos' => 'required',
            'Eksamino' => 'required',
            'universities' => 'required',
        ]);

        $user = auth()->user();
        $u_id = $user->id;

        $name = $request->input('name');
        $LastName = $request->input('LastName');
        $AM = $request->input('AM');
        $Mail = $request->input('Mail');
        $Etos = $request->input('Etos');
        $Eksamino = $request->input('Eksamino');
        $universities = $request->input('universities');
        $user_id = $u_id;
        $status = '1';

        $uop_course_Arr = $request->input('uop_course_is');
        $uop_ects_Arr = $request->input('uop_ects_is');
        $uop_links_Arr = $request->input('uop_links_is');
        $uop_professor_Arr = $request->input('uop_professor_is');

        $allo_lesson_Arr = $request->input('allo_lesson_is');
        $allo_ects_Arr = $request->input('allo_ects_is');
        $allo_links_Arr = $request->input('allo_links_is');
        $allo_professor_Arr = $request->input('allo_professor_is');

        $data=array('name'=>$name,'LastName'=>$LastName,'AM'=>$AM,'Mail'=>$Mail,'Etos'=>$Etos,'Eksamino'=>$Eksamino,'universities'=>$universities,'user_id'=>$user_id,'status'=>$status);

        DB::table('application')->insert($data);

        $lastID = DB::getPdo()->lastInsertId();

        if(!empty($uop_ects_Arr))
        {
            foreach($uop_ects_Arr as $key=>$u)
            {
                $data=array(
                    'uop_course'=>(!empty($uop_course_Arr[$key]))?$uop_course_Arr[$key]:"",
                    'uop_ects'=>$u,
                    'user_name'=>$name,
                    'user_LastName'=>$LastName,
                    'user_AM'=>$AM,
                    'user_Mail'=>$Mail,
                    'Etos'=>$Etos,
                    'Eksamino'=>$Eksamino,
                    'universities'=>$universities,
                    'user_id'=>$u_id,
                    'status'=>$status,
                    'uop_links'=>(!empty($uop_links_Arr[$key]))?$uop_links_Arr[$key]:"",
                    'uop_professor'=>(!empty($uop_professor_Arr[$key]))?$uop_professor_Arr[$key]:"",
                    'allo_lesson'=>(!empty($allo_lesson_Arr[$key]))?$allo_lesson_Arr[$key]:"",
                    'allo_ects'=>(!empty($allo_ects_Arr[$key]))?$allo_ects_Arr[$key]:"",
                    'allo_links'=>(!empty($allo_links_Arr[$key]))?$allo_links_Arr[$key]:"",
                    'allo_professor'=>(!empty($allo_professor_Arr[$key]))?$allo_professor_Arr[$key]:"",
                    'application_id'=>$lastID);

                DB::table('app_data')->insert($data);
            }
        }

        return redirect('/home')->with('message', 'Η φόρμα υποβλήθηκε με επιτυχία !! όλα πήγαν καλά.');
    }

    public function update_app_status(Request $request, $id)
    {
        $app_status = $request->input('app_status');
        $app_prof_status = $request->input('app_prof_status');

        $app_comment = $request->input('app_comment');
//        DB::insert('insert into  app_data(app_comment) value (?)',[$app_comment, $id]);
//      $app_comment = $text->input('app_comment');

		if(Auth::user()->role == 1)
		{
			DB::update('update app_data set app_prof_status = ? , app_comment = ?  where id = ?',[$app_prof_status,$app_comment,$id]);
		}
		elseif(Auth::user()->role == 0)
		{
//			DB::update('update app_data set app_status = ?, app_prof_status = ?  where id = ?',[$app_status,$app_prof_status,$id]);
			DB::update('update app_data set app_status = ? , app_comment = ?  where id = ?',[$app_status,$app_comment, $id]);
		}
        return redirect()->back()->with('message', 'Η Κατάσταση της αίτησης ανανεώθηκε με επιτυχία.');
    }

//    public function storretext (Request $request, $id)
//    {
//        $app_comment = $request->input('app_comment');
//        DB::insert('insert into  app_data set app_comment = ? where id = ?',[$app_comment, $id]);
//    }
//    public function delete($id)
//    {
//        $this->executor->delete($id);
//        return redirect()->action('Partitipation@index')->with('success', 'Data Deleted');
//    }
//
//    public function update(ParticipationTr $participationTr, $id)
//    {
//        //return $this->executor->update($lessonTr, $id);
//        $this->executor->update($id, $participationTr);
//        return  redirect('partitipation')->with('success', 'Data Updated');;
//    }
//
//    public function create()
//    {
//        return view('participations.testForm');
//    }
//
//
//
//    public function edit($id)
//    {
//        dd($this->executor->getById($id));
//    }
//
//    public function getById($id)
//    {
//        dd('kati edw..');
//        return  $this->executor->getByID($id);
//    }
}
