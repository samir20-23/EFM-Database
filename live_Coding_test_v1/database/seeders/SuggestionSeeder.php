<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Suggestion;

class SuggestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Insert dummy data into the suggestions table
        Suggestion::create([
            'content' => 'Consider adding more trail markers for better navigation.',
            'review_id' => 1, // Assuming review with ID 1 exists
        ]);

        Suggestion::create([
            'content' => 'The trail was too steep; perhaps add some resting spots.',
            'review_id' => 2, // Assuming review with ID 2 exists
        ]);

        Suggestion::create([
            'content' => 'Great hike! Maybe include more benches for resting.',
            'review_id' => 3, // Assuming review with ID 3 exists
        ]);

    }
}
