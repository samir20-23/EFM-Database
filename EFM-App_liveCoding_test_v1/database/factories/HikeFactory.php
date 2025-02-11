<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Hike;
use App\Models\User;

class HikeFactory extends Factory
{
    protected $model = Hike::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(2),
            'img_path' => $this->faker->imageUrl(),
            'location' => $this->faker->city,
            'views' => $this->faker->numberBetween(0, 1000),
            'user_id' => User::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
