<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class addedproductalert extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $message,
        public $product
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.addedproductalert');
    }
}
