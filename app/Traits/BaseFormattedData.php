<?php

namespace App\Traits;

use Illuminate\Support\Carbon;

trait BaseFormattedData
{
    public function fullName()
    {
        return $this->name . ' ' . $this->last_name;
    }

    public function fullAddress()
    {
        return $this->address . ' ' . $this->address_number . ', ' . $this->neighborhood . ', ' . $this->state;
    }

    public function phoneNumber()
    {
        return $this->phonePrefix->prefix . ' ' . $this->area_code . ' ' . $this->phone_number;
    }

    protected function inputDateBirthDate()
    {
        return Carbon::parse($this->birth_date)->format('Y-m-d');
    }
}
