<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductCardShop extends Component
{

    public Product $product;
    public function render()
    {
        return view('livewire.product-card-shop');
    }
}
