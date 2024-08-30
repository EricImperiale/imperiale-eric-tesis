<?php

namespace App\Http\Requests\Contract;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ConfirmDeleteRequest extends FormRequest
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
            'property_fk_id' => 'required|exists:properties,id',
            'owner_fk_id' => 'required|exists:owners,id',
            'tenant_fk_id' => 'required|exists:tenants,id',
        ];
    }

    public function messages(): array
    {
        return [
            'property_fk_id.required' => 'Tenés que seleccionar la Propiedad del contrato.',
            'owner_fk_id.required' => 'Tenés que seleccionar el Propietario del contrato.',
            'tenant_fk_id.required' => 'Tenés que seleccionar el Inquilino del contrato.',
        ];
    }
}
