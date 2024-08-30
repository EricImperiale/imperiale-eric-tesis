<?php

namespace App\Http\Requests\Contract;

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
    public function rules(): array
    {
        return [
            'property_fk_id' => 'required|exists:properties,id|unique:contracts,property_fk_id',
            'owner_fk_id' => [
                'required',
                'exists:owners,id',
                'different:tenant_fk_id',
                'different:guarantor_fk_id',
            ],
            'tenant_fk_id' => [
                'required',
                'exists:tenants,id',
                'different:owner_fk_id',
                'different:guarantor_fk_id',
            ],
            'guarantor_fk_id' => [
                'required',
                'exists:guarantors,id',
                'different:owner_fk_id',
                'different:tenant_fk_id',
            ],
            'currency_type_fk_id' => 'required|exists:currency_types,currency_type_id',
            'rental_price' => 'required|numeric|min:0',
            'security_deposit' => 'required|numeric|min:0',
            'description' => 'nullable|string|max_digits:255',
            'start_date' => 'required|date|before:' . now(),
            'end_date' => 'required|date|after:start_date',
        ];
    }

    public function messages(): array
    {
        return [
            'property_fk_id.required' => 'La propiedad es obligatoria.',
            'property_fk_id.exists' => 'La propiedad seleccionada no es válida.',
            'property_fk_id.unique' => 'Está propiedad ya tiene un contrato activo.',

            'owner_fk_id.required' => 'El propietario es obligatorio.',
            'owner_fk_id.exists' => 'El propietario seleccionado no es válido.',
            'owner_fk_id.different' => 'El propietario debe ser diferente del inquilino y del garante.',

            'tenant_fk_id.required' => 'El inquilino es obligatorio.',
            'tenant_fk_id.exists' => 'El inquilino seleccionado no es válido.',
            'tenant_fk_id.different' => 'El inquilino debe ser diferente del propietario y del garante.',

            'guarantor_fk_id.required' => 'El garante es obligatorio.',
            'guarantor_fk_id.exists' => 'El garante seleccionado no es válido.',
            'guarantor_fk_id.different' => 'El garante debe ser diferente del propietario y del inquilino.',

            'currency_type_fk_id.required' => 'El tipo de moneda es obligatorio.',
            'currency_type_fk_id.exists' => 'El tipo de moneda seleccionado no es válido.',

            'rental_price.required' => 'El precio del alquiler es obligatorio.',
            'rental_price.numeric' => 'El precio del alquiler debe ser un valor numérico.',
            'rental_price.min' => 'El precio del alquiler no puede ser negativo.',

            'security_deposit.required' => 'El depósito de garantía es obligatorio.',
            'security_deposit.numeric' => 'El depósito de garantía debe ser un valor numérico.',
            'security_deposit.min' => 'El depósito de garantía no puede ser negativo.',

            'description.string' => 'La descripción debe ser un texto.',
            'description.max_digits' => 'La descripción no puede tener más de 255 caracteres.',

            'start_date.required' => 'La fecha de inicio es obligatoria.',
            'start_date.date' => 'La fecha de inicio no tiene un formato válido.',
            'start_date.before' => 'La fecha de inicio debe ser anterior a la fecha actual.',

            'end_date.required' => 'La fecha de finalización es obligatoria.',
            'end_date.date' => 'La fecha de finalización no tiene un formato válido.',
            'end_date.after' => 'La fecha de finalización debe ser posterior a la fecha de inicio.',
        ];
    }
}
