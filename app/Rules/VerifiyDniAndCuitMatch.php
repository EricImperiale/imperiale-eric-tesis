<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class VerifiyDniAndCuitMatch implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $dni = preg_replace('/[^0-9]/', '', request()->input('dni'));

        // TODO: PREGUNTAR SI ESTO ES PROPENSO A INYECCIÓN SQL.
        $cuit = preg_replace('/[^0-9]/', '', $value);

        $cuitDniPart = substr($cuit, 2, 8);

        if ($cuitDniPart !== $dni) {
            $fail('El DNI y el CUIT deben ser iguales.');
        }
    }
}
