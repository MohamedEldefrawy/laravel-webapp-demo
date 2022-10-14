<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable=[
        'years_of_experience',
        'title',
        'first_name',
        'last_name',
        'user_id',
        'department_id',
        'created_by',
        'clinic_id',
    ];

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function doctorServices()
    {
        return $this->hasMany(DoctorService::class);
    }

    public function clinic(){
        return $this->belongsTo(Clinic::class);
    }

    public function doctorExperience()
    {
        return $this->hasMany(DoctorExperience::class);
    }

    public function doctorCertificate()
    {
        return $this->hasMany(DoctorCertificate::class);
    }
    
    public function doctorEducation()
    {
        return $this->hasMany(DoctorEducation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
