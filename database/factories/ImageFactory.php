<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $seed = fake()->word();
        
        return [
            'game_id' => fake()->numberBetween(1, 10000),
            'url' => 'https://picsum.photos/seed/' . $seed . '/1280/720',
            'url_sm' => 'https://picsum.photos/seed/' . $seed . '/640/360',
            'url_md' => 'https://picsum.photos/seed/' . $seed . '/960/540',
            'url_lg' => 'https://picsum.photos/seed/' . $seed . '/1280/720',
        ];
    }
}
