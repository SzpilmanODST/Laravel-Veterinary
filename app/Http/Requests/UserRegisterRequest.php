<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules;

class UserRegisterRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'cellphone' => ['required', 'unique:users,cellphone', 'min:10', 'max:10'],
            'role' => ['required', Rule::in(['admin', 'doctor', 'secretary'])],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                'confirmed', 
                PasswordRules::min(8)->letters()->symbols()->numbers()
            ]
        ];
    }

    public function messages()
    {
        return [
            'name' => 'El nombre es obligatorio',
            'last_name'=> 'El apellido es obligatorio',
            'cellphone.required' => 'El telefono es obligatorio',
            'cellphone.unique' => 'Ya existe un registro con ese telefono',
            'cellphone.min' => 'El telefono debe tener 10 digitos',
            'role' => 'El rol es obligatorio',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'Debe ser un email valido',
            'email.unique' => 'Ya existe un registro con ese email',
            'password' => 'El password debe contener al menos 8 caracteres, un simbolo y un numero'
        ];
    }
}
