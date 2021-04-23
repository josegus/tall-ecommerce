<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $name = str_replace('.', '', $this->faker->sentence($maxWords = rand(3, 5))),
            'slug' => Str::slug($name) . '-' . strtolower(Str::random(8)),
            'description' => $this->faker->optional(75)->paragraph,
            'price' => $price = $this->faker->randomFloat(2, 50, 500),
            'offer_price' => $offerPrice = $this->faker->optional()->randomFloat(2, 40, $price),
            'offer_limit' => $offerPrice
                ? $this->faker->dateTimeInInterval('+7 days', '+5 days')
                : null,
            'is_visible' => $this->faker->boolean(75),
            'brand_id' => Brand::factory(),
            'category_id' => Category::factory(),
        ];
    }

    /**
     * Indicate that the model instance must be created without relationships.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withoutRelationships()
    {
        return $this->state(function (array $attributes) {
            return [
                'brand_id' => null,
                'category_id' => null,
            ];
        });
    }
}
