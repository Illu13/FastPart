<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class desktopindexcards extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $products = Product::all()->take(3);
        $this->products = $products;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.desktopindexcards')->with('product', $this->products);
    }
}
