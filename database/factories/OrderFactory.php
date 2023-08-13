<?php

namespace Database\Factories;

use App\Models\Client;
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
            'totalPrice' => fake()->numberBetween(0,900000),
            'done'=> fake()->boolean,
            'client_id'=> Client::inRandomOrder()->first()?->id,
        ];
    }
}
