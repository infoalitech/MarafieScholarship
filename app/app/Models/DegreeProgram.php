<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DegreeProgram extends Model
{
    use HasFactory;
    public function field_study(){
        return $this->belongsTo(StudyField::class,'study_field_id', 'id');
    }
    public function applicants(){
        return $this->hasMany(ScholarshipApplicant::class,'study_field_id', 'id');
    }
}
