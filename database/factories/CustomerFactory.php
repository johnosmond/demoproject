<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
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

        return [
            'customer_name' => fake()->company(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'website' => fake()->url(),
            'inactive' =>fake()->boolean(),
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ];
    }
}
