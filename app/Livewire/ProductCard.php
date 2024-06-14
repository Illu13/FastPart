<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductCard extends Component
{


    public $showEditModal = false;

    public Product $product;
    public function render()
    {
        return view('livewire.product-card');
    }
    public function deleteGame() {
        $this->product->delete();
        $this->dispatch('renderAgain');

    }

    public function editGame() {
        $this->showEditModal = true;
    }
    #[On('changeongame')]
    public function closeModal() {
        $this->showEditModal = false;
        $this->dispatch('renderAgain');
    }

    #[On('closeModal')]
    public function cerrarModal() {
        $this->showEditModal = false;

    }
}
