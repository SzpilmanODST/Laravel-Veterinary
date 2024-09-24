<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePrescriptionRequest extends FormRequest
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
            'pet_id' => ['required'],
            'user_id' => ['required'],
            'ailment' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'pet_id' => 'La mascota es obligatoria',
            'user_id' => 'El doctor es obligatorio',
            'ailment' => 'El padecimiento es obligatorio'
        ];
    }
}
