<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "start_date_time",
        "end_date_time",
        "created_at",
        "updated_at",
        'created_by',
        'updated_by',
        'patient_id',
        'status_id',
        'doctor_service_id',
        'active',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor_service()
    {
        return $this->belongsTo(DoctorService::class);
    }
}
