<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class myproductedit extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $product,
    )
    {
        $this->categories = Category::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if ($this->product->id_user != Auth::user()->id) {
            return redirect()->route('dashboard')->with('message', 'No tienes permisos para editar este juego');
        }
        return view('components.myproductedit')->with('categories', $this->categories);
    }
}
