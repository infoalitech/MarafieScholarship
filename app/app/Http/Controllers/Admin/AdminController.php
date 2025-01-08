<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ScholarshipApplicant;
use App\Models\Scholarship;
use App\Models\ScholarshipAppMap;

class AdminController extends Controller
{
    //

    public function index()
    {
        $scholarshipApplicants=ScholarshipApplicant::paginate(30);
        return view('admin.applicants.index',compact('scholarshipApplicants'));
    }
    public function scholarships()
    {
        $scholarships=$scholarships = Scholarship::all();
        return view('admin.applicants.scholarships',compact('scholarships'));
    }

    public function scholarship_applicants($id)
    {
        $scholarship=Scholarship::find($id);
        // dd($scholarship->applicants()->wherePivot('status','applied')->get()->pluck('id')->toArray());
        $scholarshipApplicants=ScholarshipApplicant::
            whereIn('id',$scholarship->applicants()->wherePivot('status','applied')->get()->pluck('id')->toArray())
            // ->whereIn('id',$scholarship->applicants()->wherePivot('status','')->get()->pluck('id')->toArray())
            // ->whereNotIn('id',$scholarship->applicants()->wherePivot('status','review')->get()->pluck('id')->toArray())
            ->paginate(30);
            // dd($scholarship);
            // dd($scholarshipApplicants);
        //$scholarshipApplicants=ScholarshipApplicant::whereIn('id',$scholarship->applicants->pluck('id')->toArray())->paginate(30);
        return view('admin.applicants.scholarshipsindex',compact('scholarship','scholarshipApplicants'));
    }

    public function scholarshipApplicantAccepted($id)
    {
        //
        $scholarship=Scholarship::find($id);
        $scholarshipApplicants=ScholarshipApplicant::whereIn('id',$scholarship->applicants()->wherePivot('status','accept')->get()->pluck('id')->toArray())->paginate(30);
        return view('admin.applicants.scholarshipsindex',compact('scholarship','scholarshipApplicants'));
    }
    public function scholarshipApplicantRejected($id)
    {
        //
        $scholarship=Scholarship::find($id);
        $scholarshipApplicants=ScholarshipApplicant::whereIn('id',$scholarship->applicants()->wherePivot('status','reject')->get()->pluck('id')->toArray())->paginate(30);
        return view('admin.applicants.scholarshipsindex',compact('scholarship','scholarshipApplicants'));
    }
    public function scholarshipApplicantReview($id)
    {
        //
        $scholarship=Scholarship::find($id);
        $scholarshipApplicants=ScholarshipApplicant::whereIn('id',$scholarship->applicants()->wherePivot('status','review')->get()->pluck('id')->toArray())->paginate(30);
        return view('admin.applicants.scholarshipsindex',compact('scholarship','scholarshipApplicants'));
    }

    public function show($id)
    {
        //
        $scholarshipApplicant=ScholarshipApplicant::find($id);
        $token = $this->authenticateUser();
        $cnic =  $scholarshipApplicant->cnic;
        $result = $this->getDynamicSurveyPMTScore($token, $cnic);
        if ($result) {
            $pmt_score=$result['pmT_SCALED'];
        }else{
            $pmt_score="Not Available";
        }
        return view('admin.applicants.show',compact('scholarshipApplicant','pmt_score'));
    }
    public function update(Request $request)
    {
        //
        $scholarshipApplicantMap =ScholarshipAppMap::where('applicant_id',$request->scholarshipApplicant)->where('job_id',$request->scholarship_id)->first();


        $scholarshipApplicantMap->remarks=$request->review;
        $scholarshipApplicantMap->status=$request->result;
        $scholarshipApplicantMap->update();
        return redirect()->back();
    }

    function authenticateUser() {
        $url = 'http://58.65.177.220:5117/api/Users/authenticate?username=maarif&password=maarif@12345';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        if ($response) {
            $data = json_decode($response, true);
            return $data['token']; // Return the token from the response
        } else {
            return null;
        }
    }
    
    function getDynamicSurveyPMTScore($token, $cnic) {
        $url = 'http://58.65.177.220:5117/api/Dashboard/GetDynamicSurveyPMTScore?cnic='.$cnic;
        $data = json_encode(array("cnic" => $cnic));
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token, 'Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        if ($response) {
            $data = json_decode($response, true);
            return $data; // Return the whole data array
        } else {
            return null;
        }
    }
}
