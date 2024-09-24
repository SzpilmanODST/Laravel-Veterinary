<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetOwner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'cellphone',
        'email'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'pet_owner_id');
    }

    public function pets()
    {
        return $this->hasMany(Pet::class, 'pet_owner_id');
    }
}
