<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DegreeProgram;
use App\Models\StudyField;

class StudyFieldController extends Controller
{
    //

    public function index()
    {
        //
        $degreePrograms=DegreeProgram::all();
        $StudyFields=StudyField::all();
        return view('admin.study_field.index',compact('degreePrograms','StudyFields'));
    }
    public function create()
    {
        //
// dd("test");
        return view('admin.study_field.create');
    }
    public function store(Request $request)
    {
        //
        $StudyFields=new StudyField();
        $StudyFields->name=$request->name;
        $StudyFields->save();

        return redirect()->route('study_field.index');
    }
}
