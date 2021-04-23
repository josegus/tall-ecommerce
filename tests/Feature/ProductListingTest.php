<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductListingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function homepage_list_products()
    {
        $products = Product::factory()->count(5)->create();

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee($products[0]->name);
        $response->assertSee($products[1]->name);
        $response->assertSee($products[2]->name);
        $response->assertSee($products[3]->name);
        $response->assertSee($products[4]->name);
    }
}
