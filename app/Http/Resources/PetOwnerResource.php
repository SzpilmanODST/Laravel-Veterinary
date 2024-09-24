<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ShortAppointmentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PetOwnerResource extends JsonResource
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
            'name' => $this->name,
            'last_name' => $this->last_name,
            'cellphone' => $this->cellphone,
            'email' => $this->email,
            'appointments' => ShortAppointmentResource::collection($this->whenLoaded('appointments'))
        ];
    }
}
