<?php

namespace App\Http\Requests\Property;

use App\Rules\UniqueAddressIfNotApartment;
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
        $apartmentNumber = $this->request->get('apartment_number');

        return [
            'address' => [
                'required',
                'string',
                'max:125',
                //'unique:properties,address,' . $propertyId,
                new UniqueAddressIfNotApartment,
            ],
            'address_number' => [
                'required',
                'integer',
            ],
            'city' => 'string|max:255',
            'state' => 'required|string|max:255',
            'neighborhood' => 'required|string|max:255',
            'zip_code' => 'required|integer',
            'total_area' => 'required|integer',
            'covered_area' => 'required|integer',
            'description' => 'nullable|string',
            'rental_price' => 'required|integer',

            'expenses' => [
                'nullable',
                'integer',
                'required_if:property_type_fk_id,2',
                'required_if:property_type_fk_id,3',
            ],
            'floor' => [
                'nullable',
                'required_if:property_type_fk_id,2',
                'required_if:property_type_fk_id,3',
            ],
            'apartment_number' => [
                'nullable',
                'max:255',
                'required_if:property_type_fk_id,2',
                'required_if:property_type_fk_id,3',
                'unique:properties,apartment_number, ' . $apartmentNumber,
            ],

            'is_for_professional_use' => 'nullable|boolean',
            'rooms' => 'required|integer',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',

            'owner_fk_id' => 'required|exists:owners,id',
            'property_type_fk_id' => 'required|exists:property_types,property_type_id',
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'La dirección es obligatoria.',
            'address.string' => 'La dirección debe ser una cadena de texto.',
            'address.max' => 'La dirección no puede tener más de 125 caracteres.',
            'address.unique' => 'La dirección ya está en uso.',

            'address_number.required' => 'El número de dirección es obligatorio.',
            'address_number.integer' => 'El número de dirección debe ser un número entero.',
            'address_number.unique' => 'El número de dirección ya está en uso.',

            'city.string' => 'La ciudad debe ser una cadena de texto.',
            'city.max' => 'La ciudad no puede tener más de 255 caracteres.',

            'state.required' => 'La provincia es obligatoria.',
            'state.string' => 'La provincia debe ser una cadena de texto.',
            'state.max' => 'La provincia no puede tener más de 255 caracteres.',

            'neighborhood.required' => 'El barrio es obligatorio.',
            'neighborhood.string' => 'El barrio debe ser una cadena de texto.',
            'neighborhood.max' => 'El barrio no puede tener más de 255 caracteres.',

            'zip_code.required' => 'El código postal es obligatorio.',
            'zip_code.integer' => 'El código postal debe ser un número entero.',

            'total_area.required' => 'La superficie total es obligatoria.',
            'total_area.integer' => 'La superficie total debe ser un número entero.',

            'covered_area.required' => 'La superficie cubierta es obligatoria.',
            'covered_area.integer' => 'La superficie cubierta debe ser un número entero.',

            'description.string' => 'La descripción debe ser una cadena de texto.',

            'rental_price.required' => 'El precio de alquiler es obligatorio.',
            'rental_price.integer' => 'El precio de alquiler debe ser un número entero.',

            'expenses.required_if' => 'Los gastos son obligatorios para el tipo de propiedad seleccionado.',
            'expenses.integer' => 'Los gastos deben ser un número entero.',

            'floor.required_if' => 'El piso es obligatorio para el tipo de propiedad seleccionado.',
            'floor.integer' => 'El piso debe ser un número entero.',

            'apartment_number.required_if' => 'El número de departamento es obligatorio para el departamento o PH.',
            'apartment_number.string' => 'El número de departamento debe ser una cadena de texto.',
            'apartment_number.max' => 'El número de departamento no puede tener más de 255 caracteres.',
            'apartment_number.unique' => 'El número de departamento ya está registrado.',

            'is_for_professional_use.boolean' => 'El uso profesional debe ser verdadero o falso.',

            'rooms.required' => 'La cantidad de habitaciones es obligatoria.',
            'rooms.integer' => 'La cantidad de habitaciones debe ser un número entero.',

            'bedrooms.required' => 'La cantidad de dormitorios es obligatoria.',
            'bedrooms.integer' => 'La cantidad de dormitorios debe ser un número entero.',

            'bathrooms.required' => 'La cantidad de baños es obligatoria.',
            'bathrooms.integer' => 'La cantidad de baños debe ser un número entero.',

            'owner_fk_id.required' => 'El propietario es obligatorio.',
            'owner_fk_id.exists' => 'El propietario seleccionado no existe.',

            'property_type_fk_id.required' => 'El tipo de propiedad es obligatorio.',
            'property_type_fk_id.exists' => 'El tipo de propiedad seleccionado no existe.',
        ];
    }
}
