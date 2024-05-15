<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'price' => fake()->randomNumber(5),
            'desc' => fake()->sentence(),
            'type' => fake()->randomElement([
                'coffe',
                'non-coffe',
                'tea',
                'dessert',
            ]),
        ];
    }
}
