<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class insertCar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $categories = Category::all();
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.insert-car')->with('categories', $this->categories);
    }
}
