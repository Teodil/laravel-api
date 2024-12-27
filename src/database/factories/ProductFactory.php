<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    /**
     * Название модели, соответствующей фабрике.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'title' => $this->faker->text(100),
            'description' => $this->faker->text(500),
            'price' => $this->faker->randomFloat(10, 1000,10000),
            'image' => $this->faker->imageUrl(),
            'category_id' => Category::get()->random()->id,
            //
        ];
    }
}
