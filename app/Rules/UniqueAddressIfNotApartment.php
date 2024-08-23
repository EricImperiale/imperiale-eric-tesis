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
        $property_type_fk_id = request()->input('property_type_fk_id');
        $property_id = request()->input('property_id');

        if ($property_type_fk_id == 2 || $property_type_fk_id == 3) {
            return;
        }

        $exists = DB::table('properties')
            ->where('address', $value)
            ->where('id', '<>', $property_id)
            ->exists();

        if ($exists) {
            $fail('La dirección ya está en uso para otra propiedad.');
        }
    }
}
