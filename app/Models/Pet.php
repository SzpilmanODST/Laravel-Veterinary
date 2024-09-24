<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_owner_id',
        'name',
        'gender',
        'species',
        'breed',
        'age',
        'weight'
    ];

    public function petOwner()
    {
        return $this->belongsTo(PetOwner::class, 'pet_owner_id');
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class, 'pet_id');
    }
}
