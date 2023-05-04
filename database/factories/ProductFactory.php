<?php

namespace Database\Factories;

// use App\Domain\Products\Models\Product;
// use App\Domain\Categories\Models\Category;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween(1, 1000),
            'stock' => $this->faker->numberBetween(1, 10),
            'category_id' => Category::factory(),
        ];
    }
}
