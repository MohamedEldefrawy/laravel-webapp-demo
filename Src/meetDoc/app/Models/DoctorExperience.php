<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorExperience extends Model
{
    use HasFactory;

    protected $fillable=[
        'doctor_id',
        'clinic_id',
        'details',
        'from',
        'to'
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function clinic(){
        return $this->belongsTo(Clinic::class);
    }
}
