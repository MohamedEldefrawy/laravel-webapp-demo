<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'patient_id'
    ];

    /**
     * @return BelongsTo
     * @author Mohamed Eldefrawy
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
