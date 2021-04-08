<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $brands = Brand::factory()->times(30)->create();
        $categories = Category::factory()->times(30)->create();

        $faker = Faker::create();

        $amount = (int) $this->command->ask('How many products you wish to create?', 1);

        foreach (range(1, $amount) as $i) {
            $brand = $faker->boolean(75)
                ? $brands->random()
                : null;

            Product::factory()
                ->create([
                    'brand_id' => $brand,
                    'category_id' => $categories->random(),
                ]);
        }
    }
}
