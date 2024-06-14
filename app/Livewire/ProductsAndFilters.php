<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ProductsAndFilters extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $chosenCategory;
    public $minPrice;
    public $maxPrice;
    public $chosenBrand = "";

    public function render()
    {
        $categories = Category::all();
        $brands = Product::select('brand')->distinct()->get();
        if ($this->chosenCategory == 0) {
            $products = Product::inRandomOrder()->paginate(8);
            if ($this->chosenBrand != "") {
                $products = Product::inRandomOrder()->where('brand', $this->chosenBrand)->take(12)->paginate(8);
            }
        } else {
            $products = Product::where('id_category', $this->chosenCategory)->inRandomOrder()->take(12)->paginate(8);
            if ($this->chosenBrand != "") {
                $products = Product::where('id_category', $this->chosenCategory)->inRandomOrder()->where('brand', $this->chosenBrand)->take(12)->paginate(8);
            }
        }
        if ($this->minPrice != 0 && $this->maxPrice != 0) {
            if ($this->chosenCategory == 0) {
                $products = Product::inRandomOrder()->whereBetween('price', [$this->minPrice, $this->maxPrice])->take(12)->paginate(8);
                if ($this->chosenBrand != "") {
                    $products = Product::inRandomOrder()->where('brand', $this->chosenBrand)->whereBetween('price', [$this->minPrice, $this->maxPrice])->take(12)->paginate(8);
                }
            } else {
                $products = Product::where('id_category', $this->chosenCategory)->whereBetween('price', [$this->minPrice, $this->maxPrice])->inRandomOrder()->take(12)->paginate(8);
                if ($this->chosenBrand != "") {
                    $products = Product::where('id_category', $this->chosenCategory)->where('brand', $this->chosenBrand)->where('brand', $this->chosenBrand)->whereBetween('price', [$this->minPrice, $this->maxPrice])->inRandomOrder()->take(12)->paginate(8);
                }
            }
        }

        return view('livewire.products-and-filters', ['products' => $products, 'categories' => $categories, 'brands' => $brands]);
    }
}
