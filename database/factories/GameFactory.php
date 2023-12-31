<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => ucfirst(fake()->word()),
            'description' => fake()->paragraph(5),
            'year' => fake()->year(),
            'score' => fake()->numberBetween(0, 100),
            'cover' => 'https://picsum.photos/seed/' . fake()->word() . '/600/600',
        ];
    }
}
