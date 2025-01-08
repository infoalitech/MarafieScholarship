<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyField extends Model
{
    use HasFactory;
    public function field_study(){
        return $this->hasMany(DegreeProgram::class,'study_field_id', 'id');
    }
    public function applicants(){
        return $this->hasMany(ScholarshipApplicant::class,'study_field_id', 'id');
    }
}
