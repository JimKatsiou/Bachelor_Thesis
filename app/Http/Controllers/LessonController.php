<?php

namespace App\Http\Controllers;

use App\Http\data_access\data_transfer_models\LessonTr;
use App\Http\data_access\executors\lessons\LessonsExecutor;
use App\Http\data_access\executors\universities\UniversitiesExecutor;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class   LessonController extends Controller
{
    protected $executor;
    protected $validator;

    public function __construct(LessonsExecutor $executor , UniversitiesExecutor $executor2)
    {
        $this->executor = $executor;
        $this->executor2 = $executor2;
    }


    public function index()
    {
		$lessons = DB::Select('select * from lessons');
        $teaches = DB::select('select * from teaches');
        //$lessons =  $this->executor->getAll();
        //dd($lessons);
        return view('lesson.index', compact('lessons','teaches'));
    }

    public function application_list()
    {
        $data = DB::select('select * from application');
        return view('application_list',['data'=>$data]);
    }

    public function details($id)
    {
        $data = DB::select('select * from application where id = ?',[$id]);
        $app_data = DB::select('select * from app_data where application_id = ?',[$id]);
        return view('details',['data'=>$data,'app_data'=>$app_data]);
    }


    public function getAll()
    {
        $lessons =  $this->executor->getAll();
        //dd($lessons);
    }

    public function create()
    {
        return view('lesson.create');
    }

    public function add_lesson(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'ects' => 'required',
            'link' => 'required',
            'semester' => 'required'
        ]);

        $name = $request->input('name');
        $ects = $request->input('ects');
        $link = $request->input('link');
        $semester = $request->input('semester');
		$display = 1;

        $data=array('name'=>$name,'ects'=>$ects,'link'=>$link,'semester'=>$semester,'display'=>$display);

        DB::table('lessons')->insert($data);
        return redirect('lesson/index')->with('message', ' Το μάθημα προστέθηκε επιτυχώς.');
    }

    public function delete_lesson($id)
    {
        DB::delete('delete from lessons where id = ?',[$id]);
        return redirect('lesson/index')->with('message', 'Το μάθημα διαγράφηκε επιτυχώς.');
    }

	public function lesson_display($id,$display)
    {
        DB::update('update lessons set display = ? where id = ?',[$display,$id]);
        return redirect()->back()->with('message', 'H Κατάσταση του μαθήματος ενημερώθηκε επιτυχώς.');
    }

    public function edit_lesson($id)
    {
        $lesson = $this->executor->getById($id);
        //dd($university);
        return view('lesson.edit_lession', compact('lesson'))->with('success', 'Τα δεδομένα ενημερώθηκαν');

//        $data = DB::select('select * from lessons where id=?',[$id]);
//        return view('lesson/edit_lession',['data'=>$data[0]])->with('success', 'Τα δεδομένα ενημερώθηκαν');
    }

    public function update_lesson(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'ects' => 'required',
            'link' => 'required',
            'semester' => 'required'
        ]);

        $name = $request->input('name');
        $ects = $request->input('ects');
        $link = $request->input('link');
        $semester = $request->input('semester');

        DB::update('update lessons set name = ?, ects = ?, link = ?, semester = ?  where id = ?',[$name,$ects,$link,$semester,$id]);

        return redirect('lesson/index')->with('message', 'Το μάθημα ενημερώθηκε επιτυχώς.');
    }

//    public function delete($id)
//    {
//        dd($this->executor->delete($id));
//    }
//
//    public function getById($id)
//    {
//        $model = $this->executor->getByID($id);
//        dd(
//            $model,
//            $model->universities(),
//            $model->remoteProfessors(),
//            $model->connections(),
//            $model->teachers()
//        );
//    }
//
//    public function store(LessonTr $lessonTr)
//    {
//        $this->executor->create($lessonTr);
//        //return 'ok';
//        return  redirect('lesson/index')->with('success', 'Data Added');
//    }
//    public function update(LessonTr $lessonTr, $id)
//    {
//        dd($this->executor->update($id, $lessonTr));
//    }
//
//    public function edit($id)
//    {
//        dd($this->executor->getById($id));
//    }
}
