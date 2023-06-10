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

        User::factory(1000)->create();
        
        Game::factory(1000)->create()->each(function ($game) {
            $game->categories()->attach(Category::all()->random(2));
            $game->platforms()->attach(Platform::all()->random(3));
        });
        
        Collection::factory(2000)->create()->each(function ($collection) {
            $collection->games()->attach(Game::all()->random(10));
        });

        Image::factory(2000)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

    }
}
