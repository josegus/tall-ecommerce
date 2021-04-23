<?php

namespace App\Cart;

use App\Models\Product;
use Illuminate\Support\Collection;

class Cart
{
    public static function all(): Collection
    {
        return session('cart', collect());
    }

    public static function add(Product $product)
    {
        $cart = self::all();

        if (Cart::contain($product)) {
            self::increment($product);

            return;
        }

        $cart->add(CartItem::create($product));

        session()->put('cart', $cart->values());
    }

    public static function increment(Product $product, int $quantity = 1)
    {
        $item = self::find($product);

        $item->increment($quantity);
    }

    public static function find(Product $product): CartItem
    {
        $item = self::all()->first(function (CartItem $value) use ($product) {
            return $product->is($value->product());
        });

        return $item ?? null;
    }

    public static function contain(Product $product)
    {
        return self::all()->contains(function (CartItem $item) use ($product) {
            return $product->is($item->product());
        });
    }

    public static function quantityFor(Product $product): int
    {
        $item = self::find($product);

        return $item->quantity();
    }
}
