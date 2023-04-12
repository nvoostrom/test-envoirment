<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'details' => fake()->sentences(4, true),
            'client' => fake()->name(),
            'is_fulfilled' => fake()->boolean(),
            'created_at' => fake()->dateTimeBetween('-5 week', '-1 week')->format('Y-m-d H:i:s'),
            'updated_at' => fake()->dateTimeBetween('-1 week', '0 week')->format('Y-m-d H:i:s')
        ];
    }
}