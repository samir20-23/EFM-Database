<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Hike;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $hikes = Hike::all();

        // Create 20 reviews for random hikes (some users will review multiple hikes)
        foreach ($users->random(10) as $user) {
            foreach ($hikes->random(2) as $hike) {
                Review::create([
                    'content' => 'Great hike! Loved the view at the top of the mountain.',
                    'hike_id' => $hike->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
