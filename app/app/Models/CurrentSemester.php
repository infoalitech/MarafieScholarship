<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentSemester extends Model
{
    use HasFactory;

    public function scholarshipApplicant(){
        return $this->belongsTo(ScholarshipApplicant::class,'applicant_id', 'id');
    } 
    public function FieldDegree(){
        return $this->belongsTo(DegreeProgram::class,'degree_deg', 'id');
    } 

    public function FieldStudy(){
        return $this->belongsTo(StudyField::class,'field_of_study', 'id');
    } 
    
    

}
