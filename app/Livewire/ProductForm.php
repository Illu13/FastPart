<?php

namespace App\Livewire;

use Livewire\Component;

class ProductForm extends Component
{
    #[On('createdProduct')]
    public function render()
    {
        return view('livewire.product-form');
    }
}
