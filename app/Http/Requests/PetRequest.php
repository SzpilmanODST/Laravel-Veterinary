<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'species' => ['required', 'string'],
            'breed' => ['required', 'string'],
            'age' => ['required', 'numeric'],
            'weight' => ['required', 'numeric']
        ];
    }

    public function messages()
    {
        return [
            'pet_owner_id' => 'El dueño es obligatorio',
            'name' => 'El nombre es obligatorio',
            'gender' => 'El genero es obligatorio',
            'species' => 'La especie es obligatoria',
            'breed' => 'La raza es obligatoria',
            'age' => 'La edad es obligatoria',
            'weight' => 'El peso es obligatorio'
        ];    
    }
}
