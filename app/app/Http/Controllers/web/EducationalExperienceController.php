<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\ScholarshipQualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class EducationalExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $scholarshipQualifications=ScholarshipQualification::where('applicant_id',Auth()->user()->applicant->id ?? "")->get();
        return view('applicant.educational_record.index',compact('scholarshipQualifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('applicant.educational_record.create');
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

        $scholarshipQualification=new ScholarshipQualification;
        
        // $user=Auth::user();
        // dd(  $user->applicant);

        $scholarshipQualification->applicant_id=Auth::user()->applicant->id;

        $scholarshipQualification->degree_id=$request->degree_id;
        $scholarshipQualification->institute=$request->institute;
        $scholarshipQualification->year=$request->year;
        $scholarshipQualification->obt_marks=$request->obtained_marks ?? 0;
        $scholarshipQualification->total_marks=$request->total_marks ?? 0;
        $scholarshipQualification->obt_gpa=$request->gpa ?? 0;
        $scholarshipQualification->total_gpa=$request->total_gpa ?? 0;
        $scholarshipQualification->percentage=$request->percentage;
        $scholarshipQualification->division=$request->division;
        $scholarshipQualification->save();
        if($file = $request->file('marksheet')) {
            $name = $scholarshipQualification->id."_marksheet_".$request->file('marksheet')->getClientOriginalExtension();
            $path = "public/marksheet/";
            $request->marksheet->move($path,  $name);
            $scholarshipQualification->marksheet=$path.$name;
            $scholarshipQualification->update();
        }

        // dd($request);
    return redirect()->route('educational_record.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScholarshipQualification  $scholarshipQualification
     * @return \Illuminate\Http\Response
     */
    public function show(ScholarshipQualification $scholarshipQualification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScholarshipQualification  $scholarshipQualification
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // dd($id);
        $scholarshipQualification=ScholarshipQualification::find($id);
        return view('applicant.educational_record.edit',compact('scholarshipQualification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScholarshipQualification  $scholarshipQualification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $scholarshipQualification=ScholarshipQualification::find($id);
        $scholarshipQualification->degree_id=$request->degree_id;
        $scholarshipQualification->institute=$request->institute;
        $scholarshipQualification->year=$request->year;
        $scholarshipQualification->obt_marks=$request->obtained_marks ?? 0;
        $scholarshipQualification->total_marks=$request->total_marks ?? 0;
        $scholarshipQualification->obt_gpa=$request->gpa ?? 0;
        $scholarshipQualification->total_gpa=$request->total_gpa ?? 0;
        $scholarshipQualification->percentage=$request->percentage;
        $scholarshipQualification->division=$request->division;
        $scholarshipQualification->update();

        if($file = $request->file('marksheet')) {
            $name = $scholarshipQualification->id."_marksheet_".$request->file('marksheet')->getClientOriginalExtension();
            $path = "public/marksheet/";
            $request->marksheet->move($path,  $name);
            $scholarshipQualification->marksheet=$path.$name;
            $scholarshipQualification->update();
        }
        return redirect()->route('educational_record.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScholarshipQualification  $scholarshipQualification
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $scholarshipQualification=ScholarshipQualification::find($id);
        $scholarshipQualification->delete();
        return redirect()->route('educational_record.index');
        
    }
}
