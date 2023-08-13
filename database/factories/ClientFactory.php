<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           // 'name' => $this->faker->name(),
           'user_id' => User::inRandomOrder()->first()?->id,
        //    'user_id' => User::factory()->create([
        //     'userable_id' => Client::factory()->create([
              
        //     ]),
        //     'userable_type' => Client::class 
        // ]),
           'phoneNumber' => $this->faker->sentence(1),
           'address' => $this->faker->sentence(5),
           
        ];
    }
}
