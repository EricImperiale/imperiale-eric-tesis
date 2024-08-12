<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionLink extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $class,
        public string $action,
        public string $model,
        public int $modelId,
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action-link');
    }
}
