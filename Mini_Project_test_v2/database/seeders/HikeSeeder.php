<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hike;
use App\Models\User;

class HikeSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        // Create 10 hikes (some users will have more than one proposal)
        foreach ($users->random(10) as $user) {
            Hike::create([
                'title' => 'Hike Proposal ' . $user->name,
                'description' => 'Description of hike ' . $user->name,
                'views' => rand(1, 100),
                'user_id' => $user->id,
            ]);
        }
    }
}
