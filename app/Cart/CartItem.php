<?php

namespace App\Cart;

use App\Models\Product;

class CartItem
{
    protected int $quantity = 0;

    protected Product $product;

    public function __construct(Product $product, int $quantity = 1)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public static function create(Product $product, int $quantity = 1)
    {
        return new static($product, $quantity);
    }

    public function quantity(): int
    {
        return $this->quantity;
    }

    public function product(): Product
    {
        return $this->product;
    }

    public function increment(int $quantity = 1)
    {
        $this->quantity += $quantity;
    }
}
