<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class CartRow extends Component
{
    public $product;
    public $id;
    public function render()
    {
        $this->id = $this->product->id;
        return view('livewire.cart-row');
    }

    public function delete() {
        $itemsCarrito = collect(Session::get('cart')); // Asegúrate de trabajar con una colección
        $productId = $this->product->id;
        $itemsCarrito = $itemsCarrito->reject(function ($p) use ($productId) {
            return $p->id == $productId;
        });
        Session::put('cart', $itemsCarrito);

        $this->dispatch('renderAgain');
    }


}
