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
        $createdAt = fake()->dateTimeBetween('-2 years');
        $updatedAt = fake()->dateTimeBetween($createdAt, 'now');

        do {
            $product_name = ucwords(fake()->words(rand(1, 3), true));
        } while (strlen($product_name) < 6);

        return [
            'product_number' => fake()->regexify('[A-Z]{5}[0-9]{3}'),
            'product_name' => $product_name,
            'description' => fake()->sentence(rand(10, 20)),
            'price' => fake()->randomFloat(2, 25, 1000),
            'inactive' => fake()->boolean(),
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ];
    }
}
