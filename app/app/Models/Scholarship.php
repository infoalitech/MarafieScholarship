<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class Scholarship extends Model
{
    use HasFactory;

    protected $table="kiusc_jobs";
        public $timestamps = false;
        protected static function booted()
    {
        static::addGlobalScope('userScholarships', function (Builder $builder) {
            if (Auth::check()) {
                if(Auth::user()->id != 11){
                    $builder->whereHas('users', function ($query) {
                        $query->where('user_id', Auth::id());
                    });
                }
            }
        });
    }
    
    

    public function users(){
        return $this->belongsToMany(User::class,'user_scholarships','job_id','user_id');
    }

    
    public function applicants($query = null)
    {
        $relation = $this->belongsToMany(ScholarshipApplicant::class, 'kiusc_job_app_map', 'job_id', 'applicant_id')
                         ->withPivot('remarks', 'status', 'apply_date');
    
        if ($query) {
            $relation->wherePivot('status', $query);
        }
    
        return $relation;
    }
    


}
