<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WeekDay extends Model
{
    use HasFactory;


    /**
     * @author Abdullah Hegab
     * @return HasMany
     */
    public function workingSlots(): HasMany
    {
        return $this->hasMany(WorkingSlot::class);
    }

    public function doctorService()
    {
        return $this->belongsTo(DoctorService::class);
    }

}
