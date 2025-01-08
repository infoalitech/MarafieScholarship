<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipApplicant extends Model
{

    use HasFactory;
    protected $fillable = [
        "user_id","name","fname","gender",
        "dob","cnic","cell_no","postal_address",
        "tehsil_id","village","picture","working",
        "desig","employer","monthincome","ac_title",
        "bank_branch","ac_no","fass","fresh_renewal",
        "active"
    ];
    
    protected $primaryKey="id";
    protected $table="kiusc_job_applicants";
    public $timestamps = false;
    
    public function user(){
            return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function qualifications(){
        return $this->hasMany(ScholarshipQualification::class,'applicant_id', 'id');
    }

    public function applied_scholarships(){
        return $this->hasMany(ScholarshipAppMap::class,'applicant_id', 'id');
    }


    public function currentSemester(){
        return $this->hasOne(CurrentSemester::class,'applicant_id', 'id');
    }
    public function guardian(){
        return $this->hasOne(ScholarshipExperience::class,'applicant_id', 'id');
    }
    public function district(){
        return $this->belongsTo(District::class,'district_id', 'id');
    }

    public function tehsil(){
        return $this->belongsTo(ScholarshipTehsil::class,'tehsil_id', 'id');
    }
    public function appliedscholarships(){
        return $this->belongsToMany(Scholarship::class,'kiusc_job_app_map','applicant_id','job_id')->withPivot('remarks', 'status','apply_date');;;
    }
}
