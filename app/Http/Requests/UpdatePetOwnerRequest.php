<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePetOwnerRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:15'],
            'last_name' => ['required', 'string', 'max:30'],
            'cellphone' => ['required', 'unique:pet_owners,cellphone,' . $this->route('id'), 'min:10', 'max:10'],
            'email' => ['required', 'unique:pet_owners,email,' . $this->route('id'), 'email']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.max' => 'El nombre debe tener máximo 15 letras',
            'last_name.required' => 'El apellido es obligatorio',
            'last_name.max' => 'El apellido debe tener máximo 30 letras',
            'cellphone' => 'El numero telefonico es obligatorio',
            'cellphone.min' => 'El numero telefonico debe tener 10 digitos',
            'cellphone.unique' => 'Ya existe un registro con este numero telefónico',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email no es valido',
            'email.unique' => 'Ya existe un registro con este email'
        ];
    }
}
