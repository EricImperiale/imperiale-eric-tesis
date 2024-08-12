<?php

namespace App\Http\Requests\Owner;

use App\Rules\VerifiyDniAndCuitMatch;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    // TODO: PREGUNTAR SI ESTO ES PROPENSO A INYECCIÓN SQL.
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dni' => 'required|digits:8|unique:owners,dni',
            'cuit' => [
                'required',
                'digits:11',
                'unique:owners,cuit',
                new VerifiyDniAndCuitMatch,
            ],
            'email' => 'required|email|unique:owners,email',
            'address' => 'required|string|max:255',
            'address_number' => 'required|integer',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'neighborhood' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
            'phone_prefix_fk_id' => 'required|exists:phone_prefixes,phone_prefix_id',
            'phone_number' => 'required|string|max:20',
            'birth_date' => 'required|date|before_or_equal:today',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'last_name.required' => 'El apellido es obligatorio.',
            'dni.required' => 'El DNI es obligatorio.',
            'dni.digits' => 'El DNI debe tener 8 dígitos.',
            'dni.unique' => 'Este DNI ya está registrado.',
            'cuit.required' => 'El CUIT es obligatorio.',
            'cuit.digits' => 'El CUIT debe tener 11 dígitos.',
            'cuit.unique' => 'Este CUIT ya está registrado.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'address.required' => 'La dirección es obligatoria.',
            'address_number.required' => 'La altura es obligatoria.',
            'address_number.integer' => 'La altura debe ser un número entero.',
            'city.required' => 'La ciudad es obligatoria.',
            'country.required' => 'El país es obligatorio.',
            'state.required' => 'La provincia es obligatoria.',
            'neighborhood.required' => 'El barrio es obligatorio.',
            'zip_code.required' => 'El código postal es obligatorio.',
            'phone_prefix_fk_id.required' => 'El prefijo telefónico es obligatorio.',
            'phone_prefix_fk_id.exists' => 'El prefijo telefónico seleccionado no es válido.',
            'phone_number.required' => 'El número de teléfono es obligatorio.',
            'birth_date.required' => 'La fecha de nacimiento es obligatoria.',
            'birth_date.date' => 'La fecha de nacimiento debe ser una fecha válida.',
        ];
    }
}
