<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class usersSaw extends Component
{

    public  $relatedProducts;
    public function __construct(
        public $product = null
    )
    {
        if ($this->product == null) {
            $this->relatedProducts = Product::inRandomOrder()->limit(3)->get();
        } else {
        $this->relatedProducts = Product::where('id_category', $this->product->category->id)
            ->where('id', '!=', $this->product->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();
        }

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.users-saw');
    }
}
