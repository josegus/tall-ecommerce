<?php

namespace Tests\Unit\Http\Livewire;

use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Product;
use App\Http\Livewire\AddToCartButton;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddToCartButtonTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_product_is_set_for_add_to_cart_button_component()
    {
        $product = Product::factory()->create();

        Livewire::test(AddToCartButton::class, [
            'product' => $product
        ])
        ->assertSet('product', $product)
        ->assertSee('Add to cart');
    }
}
