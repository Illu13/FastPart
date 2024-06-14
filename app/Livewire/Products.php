<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;

class Products extends Component
{

    public $showForm = false;
    public $productCreated;
    public $chosenCategory;


    #[On('renderAgain')]
    public function render()
    {
        $category = Category::all();
        switch ($this->chosenCategory) {
            case 0:
                $products = Product::all()->reverse();
                break;
            default:
                $products = Product::where('id_category', $this->chosenCategory)->get();
                break;
        }
        return view('livewire.products', compact('products', 'category'));
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
        $this->productCreated = false;
    }

    #[On('createdProduct')]
    public function createdProduct()
    {
        $this->showForm = false;
        $this->productCreated = true;
    }
}
