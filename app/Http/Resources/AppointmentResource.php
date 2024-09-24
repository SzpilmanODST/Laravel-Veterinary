<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Resources\PetOwnerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
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
            'pet_owner' => new PetOwnerResource($this->petOwner),
            'day_and_hour' => Carbon::parse($this->day_and_hour)->format('d-m-y H'),
            'prescription_id' => $this->prescription_id
        ];
    }
}
