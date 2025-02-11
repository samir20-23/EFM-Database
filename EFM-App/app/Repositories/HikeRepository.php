<?php
namespace App\Repositories;

use App\Models\Hike;

class HikeRepository
{
    public function checkRecommendedHike(int $hikeId)
    {
        $hike = Hike::findOrFail($hikeId);

        // Count positive reviews where views >= 4 (you can adjust this logic)
        $positiveReviewsCount = $hike->reviews()->where('views', '>=', 4)->count();

        if ($positiveReviewsCount >= 10) {
            // Return a flag or message if the hike has 10 or more positive reviews
            return true; // This means the hike is recommended
        }

        return false; // Not enough positive reviews
    }
}
