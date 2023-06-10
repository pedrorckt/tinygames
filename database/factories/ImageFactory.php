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
            'game_id' => fake()->numberBetween(1, 1000),
            'url' => 'https://picsum.photos/' . $seed . '/picsum/800/800',
            'url_sm' => 'https://picsum.photos/' . $seed . '/picsum/200/200',
            'url_md' => 'https://picsum.photos/' . $seed . '/picsum/400/400',
            'url_lg' => 'https://picsum.photos/' . $seed . '/picsum/600/600',
        ];
    }
}
