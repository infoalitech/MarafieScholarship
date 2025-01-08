<?php

namespace App\Http\Controllers;

use App\Models\ScholarshipApplicant;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class ScholarshipApplicantController extends Controller
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
        return ScholarshipApplicant::where('user_id',$userId)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'fname' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'cnic' => 'required',
            'cell_no' => 'required',
            'postal_address' => 'required',
            'tehsil_id' => 'required',
            'village' => 'required',
            'picture' => 'required',
            // 'working' => 'required',
            // 'desig' => 'required',
            // 'employer' => 'required',
            // 'monthincome' => 'required',
            'ac_title' => 'required',
            'bank_branch' => 'required',
            'ac_no' => 'required',
            'fass' => 'required',
            'fresh_renewal' => 'required'

        ]);
        $userId = Auth::user()->id;
        $applicant= new ScholarshipApplicant();
        $applicant->user_id =$userId;
        $applicant->name  =$request['name'];
        $applicant->fname  =$request['fname'];
        $applicant->gender  =$request['gender'];
        $applicant->dob  =$request['dob'];
        $applicant->cnic  =$request['cnic'];
        $applicant->cell_no =$request['cell_no'];
        $applicant->postal_address =$request['postal_address'];
        $applicant->tehsil_id =$request['tehsil_id'];
        $applicant->village =$request['village'];
        $applicant->picture =$request['picture'];
        // $applicant->working =$request['working'];
        // $applicant->desig =$request['desig'];
        // $applicant->employer =$request['employer'];
        // $applicant->monthincome =$request['monthincome'];
        $applicant->ac_title =$request['ac_title'];
        $applicant->bank_branch =$request['bank_branch'];
        $applicant->ac_no =$request['ac_no'];
        $applicant->fass =$request['fass'];
        $applicant->fresh_renewal  =$request['fresh_renewal'];
        $applicant->save();
        return ScholarshipApplicant::find($userId);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScholarshipApplicant  $scholarshipApplicant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return ScholarshipApplicant::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScholarshipApplicant  $scholarshipApplicant
     * @return \Illuminate\Http\Response
     */
    public function edit(ScholarshipApplicant $scholarshipApplicant)
    {

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
        $applicant = ScholarshipApplicant::find($id);
        $applicant->update($request->all());
        return $applicant;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScholarshipApplicant  $scholarshipApplicant
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        return ScholarshipApplicant::destroy($id);
    }
}
