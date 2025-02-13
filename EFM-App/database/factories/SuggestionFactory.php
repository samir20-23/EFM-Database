<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Suggestion;
use App\Models\Review;
use App\Models\User;


class SuggestionFactory extends Factory
{
    protected $model = Suggestion::class;

    public function definition(): array
    {
        return [
            'content' => $this->faker->sentence(5),
            'review_id' => Review::factory(),
            'user_id' => User::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
