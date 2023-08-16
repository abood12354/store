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
            // >string('title');
            // $table->string('desc')->nullable();
            // $table->float('price');
            // $table->integer('quantity');
            // $table->decimal('sell',9,2);
       //     'title' => $this->faker->text(5),
           // 'desc' => $this->faker->sentence(3),
           'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(0,100000),
            'quantity' => $this->faker->numberBetween(0,10),
            'Assess'=> $this->faker->numberBetween(0,5),
            'sell' => $this->faker->numberBetween(0,100),
        ];
    }
}
