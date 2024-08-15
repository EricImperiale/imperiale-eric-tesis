<?php

namespace App\Searches;

class BaseSearches
{
    public function __construct(
        public ?string $fullName = null,
    )
    {}

    /**
     * @return string
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }


}
