<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class Cart extends Component
{
    public $products;
    public $price;
    #[On('renderAgain')]
    public function render()
    {
        if (Session::has('cart')) {
            $this->products = Session::get('cart');
            $this->price = 0;
            foreach ($this->products as $product) {
                $this->price += $product->price;
            }
        } else {
            $this->products = [];
        }
        return view('livewire.cart');
    }

    public function pay() {
        $order = new Order();
        $order->id_user = Auth::id();
        $order->price = $this->price;
        $order->save();
        foreach ($this->products as $product) {
            $order->products()->attach($product->id, ['date' => now()]);
        }
        Session::forget('cart');
        $this->products = [];
        $this->price = 0;
        redirect('/dashboard')->with('correct', 'Orden puesta correctamente, gracias por confiar en nosotros');

    }
}
