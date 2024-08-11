<?php

namespace App\Http\Requests\Owner;

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
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => ['required', 'digits:8', 'unique:propietarios,dni', function ($attribute, $value, $fail) {
                $cuit = $this->cuit;
                if (!str_contains($cuit, $value)) {
                    $fail('El DNI debe estar contenido en el CUIT.');
                }
            }],
            'cuit' => [
                'required',
                'digits:12',
                'unique:propietarios,cuit',
                function ($attribute, $value, $fail) {
                    $dni = $this->dni;
                    if (substr($value, 2, 8) !== $dni) {
                        $fail('El CUIT debe contener el DNI.');
                    }
                },
            ],
            'email' => 'required|email|max:255|unique:propietarios,email',
            'direccion' => 'required|string|max:255',
            'altura' => 'nullable|numeric|min:1',
            'ciudad' => 'nullable|string|max:255',
            'pais' => 'required|string|max:255',
            'provincia' => 'nullable|string|max:255',
            'barrio' => 'nullable|string|max:255',
            'codigo_postal' => 'nullable|string|max:10',
            'codigo_de_area' => 'required|string|max:10',
            'numero_de_telefono' => 'nullable|string|max:15',
            'fecha_de_nacimiento' => 'nullable|date|before_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'dni.required' => 'El DNI es obligatorio.',
            'dni.digits' => 'El DNI debe tener 8 dígitos.',
            'dni.unique' => 'El DNI ya está registrado.',
            'cuit.required' => 'El CUIT es obligatorio.',
            'cuit.digits' => 'El CUIT debe tener 12 dígitos.',
            'cuit.unique' => 'El CUIT ya está registrado.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email debe ser una dirección válida.',
            'email.unique' => 'El email ya está registrado.',
            'direccion.required' => 'La dirección es obligatoria.',
            'pais.required' => 'El país es obligatorio.',
            'codigo_de_area.required' => 'El código de área es obligatorio.',
            'fecha_de_nacimiento.date' => 'La fecha de nacimiento no es válida.',
            'fecha_de_nacimiento.before_or_equal' => 'La fecha de nacimiento no puede ser posterior a hoy.',
        ];
    }
}
