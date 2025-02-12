<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Hike;
use App\Models\Review;
use App\Models\Suggestion;

class DatabaseSeeder extends Seeder
{ 
    public function run(): void
    {
       //     methode 1 to insert
        $this->call([
        UserSeeder::class,
         HikeSeeder::class,
         ReviewSeeder::class,
         SuggestionSeeder::class,
        ]);

       // //  methode 2 to insert
        User::factory(10)->create();
 
        Hike::factory(5)->create();
 
        Review::factory(15)->create();
 
        Suggestion::factory(20)->create();
    }
}
