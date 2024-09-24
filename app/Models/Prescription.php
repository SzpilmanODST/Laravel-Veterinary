<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_owner_id',
        'pet_id',
        'user_id',
        'appointment_id',
        'day_and_hour',
        'ailment'
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointments');
    }

    public function petOwner() 
    {
        return $this->belongsTo(PetOwner::class, 'pet_owners');
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'pets');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users');
    }
}
