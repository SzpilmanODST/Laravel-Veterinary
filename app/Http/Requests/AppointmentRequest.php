<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'pet_owner_id' => ['required'],
            'day_and_hour' => ['required', 'date', 'unique:appointments,day_and_hour']
        ];
    }

    public function messages()
    {
        return [
            'pet_owner_id' => 'El dueño es obligatorio',
            'day_and_hour.required' => 'La fecha y hora es obligatoria',
            'day_and_hour.unique' => 'Ya existe una cita en ese día y hora'
        ];
    }
}
