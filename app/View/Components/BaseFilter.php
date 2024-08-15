<?php

namespace App\View\Components;

use App\Searches\BaseSearches;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BaseFilter extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $route,
        public string $name,
        public string $placeholder,
        public string $buttonText,
        public BaseSearches $baseSearches,
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.base-filter');
    }
}