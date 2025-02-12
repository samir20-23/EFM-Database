<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Review;
use App\Models\Hike;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        return [
            'content' => $this->faker->paragraph(2),
            'views' => $this->faker->numberBetween(0, 500),
            'hike_id' => Hike::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
