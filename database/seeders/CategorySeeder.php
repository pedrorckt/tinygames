<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Action',
            'Adventure',
            'Arcade',
            'Board',
            'Card',
            'Casino',
            'Casual',
            'Educational',
            'Music',
            'Puzzle',
            'Racing',
            'Role Playing',
            'Simulation',
            'Sports',
            'Strategy',
            'Trivia',
            'Word',
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create([
                'name' => $category,
            ]);
        }
    }
}
