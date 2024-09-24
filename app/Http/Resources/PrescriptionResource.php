<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionResource extends JsonResource
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
            'pet_id' => $this->pet_id,
            'doctor_id' => $this->doctor_id,
            'appointment_id' => $this->appointment_id,
            'day_and_hour' => $this->day_and_hour,
            'ailment' => $this->ailment
        ];
    }
}
