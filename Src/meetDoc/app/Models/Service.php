<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'created_by',
        'updated_by'
    ];

    public function DoctorService()
    {
        return $this->hasMany(DoctorService::class);
    }
}
