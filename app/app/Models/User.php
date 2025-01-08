<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//class User extends Authenticatable implements MustVerifyEmail
class User extends Authenticatable 
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function applicant(){
        return $this->belongsTo(ScholarshipApplicant::class, 'id', 'user_id');
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class, 'user_permissions', 'id', 'user_id');
    }
    public function roles(){
        return $this->belongsToMany(Group::class, 'user_groups','id', 'user_id');
    }
    public function jobs(){
        return $this->belongsToMany(Scholarship::class, 'user_scholarships', 'user_id','job_id');
    }

    

}
