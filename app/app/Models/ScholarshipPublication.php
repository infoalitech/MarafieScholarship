<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipPublication extends Model
{
    use HasFactory;
    protected $table="kiusc_job_publications";
    public $timestamps = false;
    
}
