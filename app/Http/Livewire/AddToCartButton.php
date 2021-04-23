<?php

namespace App\Http\Livewire;

use App\Cart\Cart;
use App\Models\Product;
use Livewire\Component;

class AddToCartButton extends Component
{
    public Product $product;

    public function render()
    {
        return view('livewire.add-to-cart-button');
    }

    public function add()
    {
        Cart::add($this->product);
    }
}
