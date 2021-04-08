<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $name = ucfirst($this->faker->word),
            'slug' => Str::slug($name) . '-' . strtolower(Str::random(8)),
            'description' => $this->faker->optional()->paragraph,
            'content' => $this->faker->optional()->randomHtml(2, 3),
        ];
    }
}
