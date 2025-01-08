<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\ScholarshipApplicant;
use App\Models\Scholarship;
use App\Models\District;
use App\Models\ScholarshipTehsil;
use Illuminate\Http\Request;
use Auth;
class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userId = Auth::user()->id;
        $applicant =  ScholarshipApplicant::where('user_id',$userId)->first();

        
        if($applicant == null){
            $applicant =new ScholarshipApplicant;
        }
        return view('applicant.personal_info.index',compact('applicant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScholarshipApplicant  $scholarshipApplicant
     * @return \Illuminate\Http\Response
     */
    public function show(ScholarshipApplicant $scholarshipApplicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScholarshipApplicant  $scholarshipApplicant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       
        // $applicant =  ScholarshipApplicant::find($id);
        $userId = Auth::user()->id;
        $applicant =  ScholarshipApplicant::where('user_id',$userId)->first();

        if($applicant == null){
            $applicant =new ScholarshipApplicant;
        }
        $districts=District::all();
        $scholarshipTehsils=ScholarshipTehsil::all();
        return view('applicant.personal_info.edit',compact('applicant','districts','scholarshipTehsils'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScholarshipApplicant  $scholarshipApplicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //



        $userId = Auth::user()->id;

        $oldapplicant =  ScholarshipApplicant::where('user_id',$userId)->first();
        $applicant=$oldapplicant;
        if($applicant == null){
            $applicant =new ScholarshipApplicant;
        }
            $applicant->user_id= $userId;
            $applicant->name=$request->name;
            $applicant->fname=$request->fname;
            $applicant->gender=$request->gender;
            $applicant->dob=$request->dob;
            $applicant->cnic=$request->cnic;
            $applicant->cell_no=$request->cell_no;
            $applicant->postal_address=$request->postal_address;
            $applicant->district_id=$request->district_id;
            $applicant->tehsil_id=$request->tehsil_id;
            $applicant->village=$request->village;
            $applicant->picture=$request->picture;
            // $applicant->working=$request->working;
            // $applicant->desig=$request->desig;
            // $applicant->employer=$request->employer;tehsil_id
            // $applicant->monthincome=$request->monthincome;
            $applicant->ac_title=$request->ac_title;
            $applicant->bank_branch=$request->bank_branch;
            $applicant->ac_no=$request->ac_no;
            $applicant->fass=$request->fass;
            $applicant->fresh_renewal=$request->fresh_renewal;
        if($oldapplicant == null){
            $applicant->save();
            //dd($applicant->id);
        }else{
            $applicant->update();
        }
        
//        dd($applicant);

        if($file = $request->file('picture')) {
            // $name = $request->file('picture')->getClientOriginalName();
            $name = $applicant->id."_profile_".$request->file('picture')->getClientOriginalExtension();
 
            $path = "public/applicants/";
     
            $request->picture->move($path,  $name);
            $applicant->picture=$path.$name;
            $applicant->update();
        }
        if($file = $request->file('domicile')) {
            // $name = $request->file('domicile')->getClientOriginalName();
            $name = $applicant->id."_domicile_".$request->file('domicile')->getClientOriginalExtension();
 
            $path = "public/applicants/";
     
            $request->domicile->move($path,  $name);
            $applicant->domicile=$path.$name;
            $applicant->update();
        }
        if($file = $request->file('cnic_pic')) {
            // $name = $request->file('cnic_pic')->getClientOriginalName();
            $name = $applicant->id."_CNIC_".$request->file('cnic_pic')->getClientOriginalExtension();
 
            $path = "public/applicants/";
     
            $request->cnic_pic->move($path,  $name);
            $applicant->cnic_pic=$path.$name;
            $applicant->update();
        }


        return redirect()->route('personal_info.index');
    }
       

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScholarshipApplicant  $scholarshipApplicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScholarshipApplicant $scholarshipApplicant)
    {
        //
    }
}