<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class mobileindexcard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct($product)
    {
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mobileindexcard')->
        with([
            'product' => $this->product,
        ]);
    }
}
