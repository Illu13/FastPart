<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class mobileindexcards extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $products = Product::all();
        $this->products = $products;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mobileindexcards')->with('products', $this->products);
    }
}
