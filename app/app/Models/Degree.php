<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;
    protected $table="kiusc_degrees";
    public $timestamps = false;

    public function scholarshipQualifications(){
        return $this->hasMany(ScholarshipQualification::class,'degree_id', 'id');
    }
}
