<?php

namespace Tests\Feature;

use App\Cart\Cart;
use App\Http\Livewire\AddToCartButton;
use App\Models\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

class AddtoCartTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function product_card_contains_livewire_component()
    {
        Product::factory()->count(5)->create();

        $this->get('/')->assertSeeLivewire('add-to-cart-button');
    }

    /** @test */
    public function a_product_can_be_add_to_cart()
    {
        $product = Product::factory()->create();

        Livewire::test(AddToCartButton::class, ['product' => $product])->call('add');

        // Assert product exist in cart
        $this->assertTrue(Cart::contain($product));

        // Assert there is only one quantity of product
        $this->assertEquals(1, Cart::quantityFor($product));
    }

    /** @test */
    public function it_increase_quantity_for_an_already_added_product()
    {
        $product = Product::factory()->create();

        Livewire::test(AddToCartButton::class, ['product' => $product])
            ->call('add')
            ->call('add');

        $this->assertEquals(2, Cart::quantityFor($product));
    }
}
