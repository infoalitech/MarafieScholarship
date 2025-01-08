<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DegreeProgram;
use App\Models\StudyField;
class DegreeProgramController extends Controller
{
    //
    public function index()
    {
        //
        $degreePrograms=DegreeProgram::all();
        $StudyFields=StudyField::all();

        return view('admin.degree_program.index',compact('degreePrograms','StudyFields'));
    }
    public function create()
    {
        //
        $StudyFields=StudyField::all();
        $degreePrograms=DegreeProgram::all();

        return view('admin.degree_program.create',compact('StudyFields'));
    }

    public function store(Request $request)
    {
        //
        $DegreeProgram=new DegreeProgram();
        $DegreeProgram->study_field_id=$request->study_field;
        $DegreeProgram->name=$request->name;
        $DegreeProgram->save();

        return redirect()->route('degree_field.index');
    }
}
