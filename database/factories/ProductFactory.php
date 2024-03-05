<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'id_user' => $this->faker->numberBetween(1, 1),
            'id_category' => $this->faker->numberBetween(1, 5),
            'name' => $this->faker->sentence(2),
            'brand' => $this->faker->company,
            'car_from' => $this->faker->word,
            'status' => $this->faker->randomElement(['available', 'sold', 'pending']),
            'antiquity' => $this->faker->randomElement(['new', 'used']),
            'kilometers' => $this->faker->numberBetween(1000, 50000),
            'price' => $this->faker->randomFloat(2, 100, 10000),
            'description' => $this->faker->paragraph,
            'photo' => $this->faker->imageUrl(640, 480, '')
        ];
    }
}
