<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Clinic extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'name',
        'address',
        'is_active',
        'clinicCode',
        "created_at",
        "updated_at",
        "created_by",
        "updated_by",
    ];

    public function clinicsPatients()
    {
        return $this->hasMany(ClinicPatient::class);
    }

    public function doctors(){
        return $this->hasMany(Doctor::class);
    }

    public function doctorExperience(){
        return $this->hasOne(DoctorExperience::class);
    }
}
