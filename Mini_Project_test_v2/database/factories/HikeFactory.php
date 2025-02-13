<?php

// database/factories/HikeFactory.php

namespace Database\Factories;

use App\Models\Hike;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class HikeFactory extends Factory
{
    protected $model = Hike::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'views' => $this->faker->numberBetween(1, 500),
            'user_id' => User::factory(), // Creates and associates a random user
        ];
    }
}
