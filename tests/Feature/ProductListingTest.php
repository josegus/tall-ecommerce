<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductListingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function homepage_can_be_rendered()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function homepage_list_products_when_they_exists()
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
