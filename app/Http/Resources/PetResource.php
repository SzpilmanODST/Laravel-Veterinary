<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'pet_owner_id' => $this->pet_owner_id,
            'name' => $this->name,
            'gender' => $this->gender,
            'species' => $this->species,
            'breed' => $this->breed,
            'age' => $this->age,
            'weight' => $this->weight
        ];
    }
}
