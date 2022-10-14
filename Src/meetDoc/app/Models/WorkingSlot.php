<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkingSlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'break_time_in_minutes',
        'slot_duration_in_minutes',
        'week_day_id',
        'doctor_service_id',
    ];

    /**
     * @return BelongsTo
     * @author Abdullah Hegab
     */
    public function doctorService(): BelongsTo
    {
        return $this->belongsTo(DoctorService::class);
    }

    /**
     * @return BelongsTo
     * @author Abdullah Hegab
     */
    public function weekDay(): BelongsTo
    {
        return $this->belongsTo(WeekDay::class);
    }
}
