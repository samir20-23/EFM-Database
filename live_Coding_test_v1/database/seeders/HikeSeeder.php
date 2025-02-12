<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hike;
use Illuminate\Support\Facades\DB;

class HikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert dummy data into the hikes table
        Hike::create([
            'title' => 'Mountain Adventure',
            'description' => 'A thrilling hike up the highest mountain in the region.',
            'img_path' => '/images/hikes/tanger.png',
            'location' => 'tanger',
            'views' => '1500',
            'user_id' => 1, // Assuming user with ID 1 exists
        ]);

        Hike::create([
            'title' => 'River Trail',
            'description' => 'A peaceful hike along the river, perfect for nature lovers.',
            'img_path' => '/images/hikes/tanger.png',
            'location' => 'tanger',
            'views' => '500',
            'user_id' => 2, // Assuming user with ID 2 exists
        ]);

        Hike::create([
            'title' => 'Forest Expedition',
            'description' => 'An exciting exploration of the deep forest trails.',
            'img_path' => '/images/hikes/tanger.png',
            'location' => 'tanger',
            'views' => '1000',
            'user_id' => 1, // Assuming user with ID 1 exists
        ]);
    }
}

