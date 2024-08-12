<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

trait BaseFormattedData
{
    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }

    public function fullAddress(): string
    {
        return $this->address . ' ' . $this->address_number . ', ' . $this->neighborhood . ', ' . $this->state;
    }

    public function phoneNumber(): string
    {
        return $this->phonePrefixes->prefix . ' ' . $this->area_code . ' ' . $this->phone_number;
    }

    public function inputDateBirthDate(): string
    {
        return Carbon::parse($this->birth_date)->format('Y-m-d');
    }
}
