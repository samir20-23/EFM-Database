<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Suggestion;
use App\Models\Review;
use App\Models\User;

class SuggestionSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $reviews = Review::all();

        // Create 30 suggestions (some reviews will have multiple suggestions)
        foreach ($reviews->random(15) as $review) {
            foreach ($users->random(2) as $user) {
                Suggestion::create([
                    'content' => 'I agree! Maybe we could try a different route next time for better views.',
                    'review_id' => $review->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
