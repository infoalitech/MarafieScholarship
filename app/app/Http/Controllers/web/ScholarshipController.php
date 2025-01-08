<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use App\Models\ScholarshipApplicant;
use App\Models\ScholarshipAppMap;

use Illuminate\Http\Request;
use Auth;
class ScholarshipController extends Controller
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
        $applicant =  ScholarshipApplicant::where('user_id',$userId)->first();;
        $scholarships=Scholarship::where('active','1')->get();



        $user = Auth::user();
        $errors=[];
        $applicant = Auth::user()->applicant;
        $scholarships = Scholarship::where('active', '1')->get();
        $errors = [];
    
        if(!$applicant){
            $errors['gcompany'] = 'Applicant Data is Required';
        }else{
            if (!$applicant->name) {
                $errors['name'] = 'Name is required';
            }
            if (!$applicant->fname) {
                $errors['fname'] = 'Father\'s name is required';
            }
            if (!$applicant->gender) {
                $errors['gender'] = 'Gender is required';
            }
            if (!$applicant->dob) {
                $errors['dob'] = 'Date of Birth is required';
            }
            if (!$applicant->cnic) {
                $errors['cnic'] = 'CNIC is required';
            }
            if (!$applicant->cell_no) {
                $errors['cell_no'] = 'Cell number is required';
            }
            if (!$applicant->postal_address) {
                $errors['postal_address'] = 'Postal address is required';
            }
            if (!$applicant->district_id) {
                $errors['district_id'] = 'District is required';
            }
            if (!$applicant->tehsil_id) {
                $errors['tehsil_id'] = 'Tehsil is required';
            }
            if (!$applicant->village) {
                $errors['village'] = 'Village is required';
            }
            if (!$applicant->picture) {
                $errors['picture'] = 'Picture is required';
            }
            if (!$applicant->domicile) {
                $errors['domicile'] = 'Domicile is required';
            }
            if (!$applicant->cnic_pic) {
                $errors['cnic_pic'] = 'CNIC picture is required';
            }
            if (!$applicant->ac_title) {
                $errors['ac_title'] = 'Account title is required';
            }
            if (!$applicant->bank_branch) {
                $errors['bank_branch'] = 'Bank branch is required';
            }
            if (!$applicant->ac_no) {
                $errors['ac_no'] = 'Account number is required';
            }
            if (!$applicant->fass) {
                $errors['fass'] = 'Fass is required';
            }
            foreach ($applicant->qualifications as $qualification) {
                if (!$qualification->degree_id) {
                    $errors['degree_id'] = 'Degree ID is required';
                }
                if (!$qualification->institute) {
                    $errors['institute'] = 'Institute is required';
                }
                if (!$qualification->year) {
                    $errors['year'] = 'Year is required';
                }
                // if (!$qualification->obt_marks) {
                //     $errors['obt_marks'] = 'Obtained marks are required';
                // }
                // if (!$qualification->total_marks) {
                //     $errors['total_marks'] = 'Total marks are required';
                // }
                // if (!$qualification->obt_gpa) {
                //     $errors['obt_gpa'] = 'Obtained GPA is required';
                // }
                // if (!$qualification->total_gpa) {
                //     $errors['total_gpa'] = 'Total GPA is required';
                // }
                if (!$qualification->percentage) {
                    $errors['percentage'] = 'Percentage is required';
                }
                if (!$qualification->division) {
                    $errors['division'] = 'Division is required';
                }
                if (!$qualification->marksheet) {
                    $errors['marksheet'] = 'Marksheet is required';
                }
            }
            $guardian = $applicant->guardian; // Assuming there's a relationship set up in the model
            
            // dd($applicant);
            if (!$guardian) {
                $errors['gcompany'] = 'Guardian Detail is Required';

            }else{
                if (!$guardian->gname) {
                    $errors['gname'] = 'Guardian name is required';
                }
                if (!$guardian->gcnic) {
                    $errors['gcnic'] = 'Guardian CNIC is required';
                }
                if (!$guardian->galive) {
                    $errors['galive'] = 'Guardian alive status is required';
                }
                if (!$guardian->gpassion) {
                    $errors['gpassion'] = 'Guardian passion is required';
                }
                if (!$guardian->gstatus) {
                    $errors['gstatus'] = 'Guardian status is required';
                }
                if (!$guardian->gcompany) {
                    $errors['gcompany'] = 'Guardian company is required';
                }
                if (!$guardian->gdesic) {
                    $errors['gdesic'] = 'Guardian designation is required';
                }
                if (!$guardian->gcell) {
                    $errors['gcell'] = 'Guardian cell number is required';
                }
                if (!$guardian->gphone) {
                    $errors['gphone'] = 'Guardian phone number is required';
                }
                if (!$guardian->gincome) {
                    $errors['gincome'] = 'Guardian income is required';
                }
                if (!$guardian->income_certificate) {
                    $errors['income_certificate'] = 'Income certificate is required';
                }
                if (!$guardian->mother_alive) {
                    $errors['mother_alive'] = 'Mother alive status is required';
                }
                if (!$guardian->mother_working) {
                    $errors['mother_working'] = 'Mother working status is required';
                }
            }
            $educationDetails = $applicant->currentSemester;
            if (!$educationDetails) {
                $errors['semester_detail'] = 'Current Semester Detail is Required';
            }else{
                // foreach ($educationDetails as $education) {
                    if (!$educationDetails->collegeuni) {
                        $errors['collegeuni'] = 'College/University name is required';
                    }
                    // if (!$educationDetails->degree) {
                    //     $errors['degree'] = 'Degree is required';
                    // }
                    if (!$educationDetails->field_of_study) {
                        $errors['field_of_study'] = 'Field Of Study is required';
                    }
                    if (!$educationDetails->degree_deg) {
                        $errors['degree'] = 'Degree is required';
                    }
                    if (!$educationDetails->currents) {
                        $errors['currents'] = 'Current status is required';
                    }
                    if (!$educationDetails->last_fee) {
                        $errors['last_fee'] = 'Last fee details are required';
                    }
                    if (!$educationDetails->bonafide) {
                        $errors['bonafide'] = 'Bonafide certificate details are required';
                    }
                // }
            }
        }
        return view('applicant.scholarships.index',compact('applicant','scholarships','errors'));
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
        $scholarshipAppMap = new ScholarshipAppMap;
        $scholarshipAppMap->applicant_id=Auth::user()->applicant->id;
        $scholarshipAppMap->job_id=$request->scholarship_id;
        $scholarshipAppMap->apply_date=now();
        $scholarshipAppMap->save();

        return redirect()->route('scholarship.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $userId = Auth::user()->id;
        $applicant =  ScholarshipApplicant::where('user_id',$userId)->first();;
        $ScholarshipAppMap = ScholarshipAppMap::find($id);

        // dd($ScholarshipAppMap );
        return view('applicant.scholarships.show',compact('applicant','ScholarshipAppMap'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function edit(Scholarship $scholarship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scholarship $scholarship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scholarship $scholarship)
    {
        //
    }
}
