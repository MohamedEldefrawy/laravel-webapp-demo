<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Patient extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'weight',
        'height',
        'gender',
        'age',
        'blood_type',
        'first_name',
        'last_name',
        "created_by",
        "user_id",
    ];


    /**
     * @return BelongsTo
     * @author Mohamed Eldefrawy
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     * @author Mohamed Eldefrawy
     */
    public function medicalDocuments(): HasMany
    {
        return $this->hasMany(MedicalDocument::class);
    }


    /**
     * @return HasMany
     * @author Abdullah Hegab
     */
    public function clinicsPatients(): HasMany
    {
        return $this->hasMany(ClinicPatient::class);
    }


    /**
     * @return HasMany
     * @author Mohamed Eldefrawy
     */
    public function symptoms(): HasMany
    {
        return $this->hasMany(PatientSymptom::class);
    }

    /**
     * @return HasMany
     * @author Ahmed Abdelaty
     */
    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

}
