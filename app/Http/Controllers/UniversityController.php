<?php

namespace App\Http\Controllers;

use App\Http\data_access\data_base_models\Lesson;
use App\Http\data_access\data_base_models\University;
use App\Http\data_access\data_transfer_models\UniversityTr;
use App\Http\data_access\executors\universities\UniversitiesExecutor;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
//use AutoMapperPlus\Configuration\AutoMapperConfig;
//use AutoMapperPlus\AutoMapper;


class UniversityController extends Controller
{
    protected $executor;
    protected $validator;


    public function __construct(UniversitiesExecutor $executor)
    {
        $this->executor = $executor;
    }

    public function index()
    {
        //$universities = $this->executor->getAll();
        //dd($universities);
        $universities = DB::Select('select * from universities');
        return view('university.index', compact('universities'));
    }

    public function getAll()
    {
        $universities = $this->executor->getAll();
        dd($universities);
    }

    public function create()
    {
        return view('university.create');
    }

    public function add_university(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'country' => 'required',
            'code' => 'required',
            'web_site' => 'required',
            'recommendedSkills' => 'required',
        ]);

        $name = $request->input('name');
        $country = $request->input('country');
        $code = $request->input('code');
        $web_site = $request->input('web_site');
        $recommendedSkills = $request->input('recommendedSkills');
        $display = 1;

        $data=array('name'=>$name, 'country'=>$country, 'code'=>$code, 'web_site'=>$web_site, 'recommendedSkills'=>$recommendedSkills, 'display'=>$display);

        DB::table('universities')->insert($data);
        return redirect('university/index')->with('message', ' Το Πανεπιστήμιο προστέθηκε επιτυχώς.');
    }


    public function university_display($id,$display)
    {
        DB::update('update universities set display = ? where id = ?',[$display,$id]);
        return redirect()->back()->with('message', 'Το status του Πανεπιστημίου ενημερώθηκε επιτυχώς.');
    }


//    public function store(UniversityTr $universityTr)
//    {
//        $this->executor->create($universityTr);
//        //return "ok";
//        return  redirect('university/index')->with('success', 'Data Added');
//    }


    public function getById($id)
    {
        dd($this->executor->getByID($id));
    }


    public function edit($id)
    {
        $university = $this->executor->getById($id);
        //dd($university);
        return view('university.edit', compact('university'))->with('success', 'Τα δεδομένα ενημερώθηκαν με επιτυχία');;

    }

	public function university_update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'country' => 'required',
            'code' => 'required',
            'web_site' => 'required',
            'recommendedSkills' => 'required',
        ]);

        $name = $request->input('name');
        $country = $request->input('country');
        $code = $request->input('code');
        $web_site = $request->input('web_site');
        $recommendedSkills = $request->input('recommendedSkills');

        DB::update('update universities set name = ?, country= ?, code= ?, web_site= ?, recommendedSkills= ?  where id = ?',[$name,$country,$code,$web_site,$recommendedSkills,$id]);

        return redirect('/university/index')->with('message', 'Τα δεδομένα ενημερώθηκαν με επιτυχία.');
    }


    //    public function delete($id)
//    {
//        //$deleted = $this->executor->getByID($id);
//        $this->executor->delete($id);
//        return redirect('university.index')->with('success', 'Data Deleted');
//    }

//    public function delete_uni($id)
//    {
//        DB::delete('delete from universities where id = ?',[$id]);
//        return redirect('university/index')->with('message', 'University Delete Successfully.');
//    }

//    public function update(UniversityTr $universityTr, $id)
//    {
//        $this->executor->update($id, $universityTr);
//        return  redirect('university.index')->with('success', 'Τα δεδομένα ενημερώθηκαν με επιτυχία');
//    }
}
