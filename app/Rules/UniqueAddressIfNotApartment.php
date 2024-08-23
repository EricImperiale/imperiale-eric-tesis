<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UniqueAddressIfNotApartment implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // TODO: Propenso a inyección SQL?
        $propertyFkId = request()->input('property_type_fk_id');
        $propertyId = request()->input('property_id');
        $addressNumber = request()->input('address_number');

        if ($propertyFkId == 2 || $propertyFkId == 3) {
            return;
        }

        $exists = DB::table('properties')
            ->where('address', $value)
            ->where('address_number', $addressNumber)
            ->where('id', '<>', $propertyId)
            ->exists();

        if ($exists) {
            $fail('La dirección ya está en uso para otra propiedad.');
        }
    }
}
