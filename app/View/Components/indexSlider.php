<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class indexSlider extends Component
{
    /**
     * Create a new component instance.
     */
    public $randomProducts;
    public function __construct()
    {
        $this->randomProducts = Product::inRandomOrder()->limit(6)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.index-slider');
    }
}
