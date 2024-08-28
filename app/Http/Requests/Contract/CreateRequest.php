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
            'property_fk_id' => 'required|exists:properties,id',
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
            'rental_price' => 'required|numeric',
            'security_deposit' => 'required|numeric',
            'description' => 'nullable|string|max_digits:255',
            'start_date' => 'required|date|before:' . now(),
            'end_date' => 'required|date|after:start_date',
        ];
    }

    public function messages(): array
    {
        return [

        ];
    }
}
