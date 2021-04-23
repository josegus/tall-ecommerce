<?php

namespace Tests\Feature;

use App\Cart\Cart;
use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_product_can_be_add_to_cart()
    {
        $product = Product::factory()->create();

        Cart::add($product);

        $this->assertTrue(Cart::contain($product));
    }

    /** @test */
    public function a_product_exist_in_cart()
    {
        $product = Product::factory()->create();

        Cart::add($product);

        $this->assertTrue(Cart::contain($product));
    }

    /** @test */
    public function it_increments_quantity_for_a_product()
    {
        $product = Product::factory()->create();

        // Add for first time
        Cart::add($product);

        // Add for second time
        Cart::increment($product, 2);

        $this->assertEquals(3, Cart::quantityFor($product));
    }

    /** @test */
    public function it_increments_quantity_for_an_already_added_poduct()
    {
        $product = Product::factory()->create();

        // Add the product for first time
        Cart::add($product);

        // Add the same product for second time
        Cart::add($product);

        $this->assertEquals(2, Cart::quantityFor($product));
    }
}
