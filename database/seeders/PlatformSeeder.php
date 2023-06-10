<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Platform;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $platforms = [
            'PC',
            'Playstation',
            'Xbox',
            'Nintendo',
            'Mobile',
            'Other',
        ];

        foreach ($platforms as $platform) {
            Platform::create([
                'name' => $platform,
            ]);
        }
    }
}
