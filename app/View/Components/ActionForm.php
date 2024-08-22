<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class ActionForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $model = null,
        public ?Collection $phonePrefixes = null,
        public ?Collection $owners = null,
        public ?Collection $propertyTypes = null,
        public ?string $modelId = null,
        public string $formType,
        public string $action,
        public string $route,
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action-form');
    }
}
