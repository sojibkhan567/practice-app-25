<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'name' => fake()->realText(),
            'description' => fake()->paragraph(),
            'price' => fake()->randomNumber(4, false),
            'mobile' => fake()->phoneNumber(),
            'feature' => 'yes',
        ];
    }
}
