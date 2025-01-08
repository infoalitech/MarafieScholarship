<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\CurrentSemester;
use Illuminate\Http\Request;
use App\Models\DegreeProgram;
use App\Models\StudyField;
use App\Models\ScholarshipApplicant;
use Auth;
class CurrentSemesterComtroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $currentSemester=CurrentSemester::where('applicant_id',Auth()->user()->applicant->id ?? "")->first();
        
        if($currentSemester == null){
            $currentSemester =new CurrentSemester;
        }
        return view('applicant.current.index',compact('currentSemester'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $currentSemester=CurrentSemester::where('applicant_id',Auth()->user()->applicant->id ?? "")->first();
        
        $StudyFields=StudyField::all();
        $degreePrograms=DegreeProgram::all();
        if($currentSemester == null){
            $currentSemester =new CurrentSemester;
        }
        return view('applicant.current.create',compact('currentSemester','StudyFields','degreePrograms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $userId = Auth::user()->id;
        $applicant =  ScholarshipApplicant::where('user_id',$userId)->first();

        $applicant->fresh_renewal=$request->fresh_renewal;
        $applicant->update();
        
        if($request->applicant_id == null){
            $currentSemester =new CurrentSemester;
        }else{
            $currentSemester =CurrentSemester::find($request->applicant_id);
        }
        $currentSemester->collegeuni=$request->collegeuni;
        $currentSemester->degree=$request->degree;
        $currentSemester->currents=$request->currents;
        $currentSemester->field_of_study=$request->field_of_study;
        $currentSemester->degree_deg=$request->degree_deg;

        // dd($request->degree_deg);

        $currentSemester->applicant_id=Auth()->user()->applicant->id;
        if($request->applicant_id == null){
            $currentSemester->save();
        }else{
            $currentSemester->update();
        }
        if($file = $request->file('last_fee')) {
            // $name = $request->file('last_fee')->getClientOriginalName();
            $name = $currentSemester->id."_last_fee_".$request->file('last_fee')->getClientOriginalExtension();
            $path = "public/currentSemesters/";
            $request->last_fee->move($path,  $name);
            $currentSemester->last_fee=$path.$name;
            $currentSemester->update();
        }
        if($file = $request->file('bonafide')) {
            // $name = $request->file('bonafide')->getClientOriginalName();
            $name = $currentSemester->id."_bonafide_".$request->file('bonafide')->getClientOriginalExtension();
            $path = "public/currentSemesters/";
            $request->bonafide->move($path,  $name);
            $currentSemester->bonafide=$path.$name;
            $currentSemester->update();
        }
        return redirect()->route('current.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CurrentSemester  $currentSemester
     * @return \Illuminate\Http\Response
     */
    public function show(CurrentSemester $currentSemester)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CurrentSemester  $currentSemester
     * @return \Illuminate\Http\Response
     */
    public function edit(CurrentSemester $currentSemester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CurrentSemester  $currentSemester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CurrentSemester $currentSemester)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CurrentSemester  $currentSemester
     * @return \Illuminate\Http\Response
     */
    public function destroy(CurrentSemester $currentSemester)
    {
        //
    }
}
