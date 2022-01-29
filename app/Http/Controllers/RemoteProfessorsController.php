<?php

namespace App\Http\Controllers;

use App\data_access\data_transfer_models\RemoteProfessorTr;
use App\data_access\executors\RemoteProfessorsExecutor;
use Illuminate\Http\Request;

class RemoteProfessorsController extends Controller
{

    protected $executor;
    protected $validator;


    public function __construct(RemoteProfessorsExecutor $executor)
    {
        $this->executor = $executor;
    }


    public function index()
    {
        return $this->executor->getAll();
    }

    public function getAll()
    {
        return $this->executor->getAll();
    }

    public function delete($id)
    {
        $this->executor->delete($id);
        return redirect()->action('RemoteProfessorController@index')->with('success', 'Data Deleted');
    }

    public function getById($id)
    {
        return $this->executor->getByID($id);
    }

    public function update(RemoteProfessorTr $remoteProfessorTr, $id)
    {
        return $this->executor->update($remoteProfessorTr, $id);
    }

    public function create()
    {
        return view('remote-professor.create');
    }

    public function store(RemoteProfessorTr $lessonTr)
    {
        $this->executor->create($lessonTr);
        return  redirect('lesson');
    }

    public function edit($id)
    {
        $remoteProfessor = $this->executor->getById($id);
        return view('remote-professor.edit')->with(['remoteProfessor' => $remoteProfessor]);
    }




    public function test(RemoteProfessorTr $tr)
    {
        //        $rm = new RemoteProfessorTr();
        //        $rm->name = 'allos';
        //        $rm->surname = 'kapoios';
        dd($tr);
        return null; //$this->executor->create($rm);
    }
}
