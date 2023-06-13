<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Collection::factory(1_000)->create()->each(function ($collection) {
            $random = array();
            for ($i = 0; $i < 3; $i++) {
                $random[$i] = rand(1, 10_000);
            }
            $collection->games()->attach($random);
        });
    }
}
