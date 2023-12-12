<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customer_id = Customer::inRandomOrder()->first()->id;
        $createdAt = fake()->dateTimeBetween('-2 years');
        $updatedAt = fake()->dateTimeBetween($createdAt, 'now');

        return [
            'customer_id' => $customer_id,
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'phone' => fake()->phoneNumber(),
            'text_capable' => fake()->boolean(),
            'email' => fake()->email(),
            'inactive' => fake()->boolean(),
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ];
    }
}
