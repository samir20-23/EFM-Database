<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if the test user already exists
        if (!User::where('email', 'test@example.com')->exists()) {
            User::create([
                'name' => 'samir',
                'email' => 'samir@example.com',
                'password' => Hash::make('samir123'), // hashed password
                'email_verified_at' => now(), // optional email verification
            ]);
            User::create([
                'name' => 'ahmed',
                'email' => 'ahmed@example.com',
                'password' => Hash::make('ahmed123'), // hashed password
                'email_verified_at' => now(), // optional email verification
            ]);
        }

        // Optionally, create more users using a factory
        User::factory(5)->create(); // Creates 5 random users
    }
}
