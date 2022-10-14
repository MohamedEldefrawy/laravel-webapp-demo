<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClinicPatient extends Model
{
//    protected $table = 'clinic_patient';
    use HasFactory;

    protected $fillable = [
        'id', 'patient_code', 'created_at', 'updated_at', 'created_by', 'updated_by', 'patient_id', 'clinic_id'
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function clinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class);
    }

}
