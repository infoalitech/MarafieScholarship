<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\ScholarshipExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $scholarshipExperience=ScholarshipExperience::where('applicant_id',Auth()->user()->applicant->id ?? "")->first();
        
        if($scholarshipExperience == null){
            $scholarshipExperience =new ScholarshipExperience;
        }
        return view('applicant.guardian_detail.index',compact('scholarshipExperience'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $scholarshipExperience=ScholarshipExperience::where('applicant_id',Auth()->user()->applicant->id ?? "")->first();
        
        if($scholarshipExperience == null){
            $scholarshipExperience =new ScholarshipExperience;
        }
        return view('applicant.guardian_detail.create',compact('scholarshipExperience'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->applicant_id == null){
            $scholarshipExperience =new ScholarshipExperience;
            $scholarshipExperience->applicant_id=Auth()->user()->applicant->id;
        }else{
            $scholarshipExperience =ScholarshipExperience::find($request->applicant_id);
        }
        $scholarshipExperience->gname=$request->gname;
        $scholarshipExperience->gcnic=$request->gcnic;
        $scholarshipExperience->galive=$request->galive;
        $scholarshipExperience->gpassion=$request->gpassion;
        $scholarshipExperience->gstatus=$request->gstatus;
        $scholarshipExperience->gcompany=$request->gcompany;
        $scholarshipExperience->gdesic=$request->gdesic;
        $scholarshipExperience->gcell=$request->gcell;
        $scholarshipExperience->gphone=$request->gphone;
        $scholarshipExperience->gincome=$request->gincome;
        $scholarshipExperience->mother_alive=$request->mother_alive;
        $scholarshipExperience->mother_working=$request->mother_working;
        if($request->id == null){
            $scholarshipExperience->save();
        }else{
            $scholarshipExperience->update();
        }
        if($file = $request->file('income_certificate')) {
            $name = $scholarshipExperience->id."_income_certificate_".$request->file('income_certificate')->getClientOriginalExtension();
            $path = "public/guardian/";
            $request->income_certificate->move($path,  $name);
            $scholarshipExperience->income_certificate=$path.$name;
            $scholarshipExperience->update();
        }
        return redirect()->route('guardian_detail.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScholarshipExperience  $scholarshipExperience
     * @return \Illuminate\Http\Response
     */
    public function show(ScholarshipExperience $scholarshipExperience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScholarshipExperience  $scholarshipExperience
     * @return \Illuminate\Http\Response
     */
    public function edit(ScholarshipExperience $scholarshipExperience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScholarshipExperience  $scholarshipExperience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScholarshipExperience $scholarshipExperience)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScholarshipExperience  $scholarshipExperience
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScholarshipExperience $scholarshipExperience)
    {
        //
    }
}
