<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipAppMap extends Model
{
    use HasFactory;

    // protected $table="kiusc_job_app_map";
    public $timestamps = false;
    
    public function applied(){
        return $this->hasMany(ScholarshipAppMap::class,'applicant_id', 'id');
    }
    public function jobs(){
        return $this->hasMany(ScholarshipAppMap::class,'applicant_id', 'id');
    }
}
