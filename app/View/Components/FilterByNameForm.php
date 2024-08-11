<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilterByNameForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $route,
        public string $name,
        public string $placeholder,
        public string $buttonText,
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filter-by-name-form');
    }
}
