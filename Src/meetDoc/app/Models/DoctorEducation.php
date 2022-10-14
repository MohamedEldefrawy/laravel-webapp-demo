<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorEducation extends Model
{
    use HasFactory;

    protected $fillable=[
        'doctor_id',
        'details',
        'from',
        'to'
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
