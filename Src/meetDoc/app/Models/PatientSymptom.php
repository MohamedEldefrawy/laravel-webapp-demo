<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientSymptom extends Model
{
    use HasFactory;

    protected $fillable = [
        'symptom',
        'name',
        'type',
        'uploaded_by'
    ];


    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

}
