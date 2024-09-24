<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'pet_owner_id',
        'day_and_hour',
        'prescription_id'
    ];

    public function petOwner()
    {
        return $this->belongsTo(PetOwner::class, 'pet_owner_id');
    }

    public function prescription()
    {
        return $this->hasOne(Prescription::class, 'appointment_id');
    }
}
