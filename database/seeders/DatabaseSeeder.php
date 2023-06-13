<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Game;
use App\Models\Collection;
use App\Models\Category;
use App\Models\Image;
use App\Models\Platform;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(CategorySeeder::class);
        $this->call(PlatformSeeder::class);

        User::factory(10_000)->create();
        
        Game::factory(10_000)->create()->each(function ($game) {
            $game->categories()->attach(Category::all()->random(2));
            $game->platforms()->attach(Platform::all()->random(3));
        });
        
        $this->call(CollectionSeeder::class);

        Image::factory(30_000)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

    }
}
