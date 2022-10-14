<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DoctorService extends Model
{
    use HasFactory;

    protected $fillable=[
        'service_id',
        'doctor_id',
        'week_id',
        'name'
    ];

    /**
     * @author Abdullah Hegab
     * @return BelongsTo
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * @author Abdullah Hegab
     * @return BelongsTo
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * @author Abdullah Hegab
     * @return HasMany
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * @author Abdullah Hegab
     * @return HasMany
     */
    public function workingSlots(): HasMany
    {
        return $this->hasMany(WorkingSlot::class);
    }

    public function weekDay()
    {
        return $this->hasMany(WeekDay::class);
    }
}
