<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipQualification extends Model
{
    use HasFactory;
    // protected $table="kiusc_job_qualifications";
    public $timestamps = false;

    public function applicant(){
        return $this->belongsTo(ScholarshipQualification::class,'applicant_id', 'id');
    }


    public function degree(){
        return $this->belongsTo(Degree::class,'degree_id', 'id');
    }
}
