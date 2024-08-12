<?php

namespace App\Traits;

use Illuminate\Support\Carbon;

trait BaseFormattedData
{
    public function fullName(): string
    {
        return $this->name . ' ' . $this->last_name;
    }

    public function fullAddress(): string
    {
        return $this->address . ' ' . $this->address_number . ', ' . $this->neighborhood . ', ' . $this->state;
    }

    public function phoneNumber(): string
    {
        return $this->phonePrefix->prefix . ' ' . $this->area_code . ' ' . $this->phone_number;
    }

    protected function inputDateBirthDate(): string
    {
        return Carbon::parse($this->birth_date)->format('Y-m-d');
    }
}
