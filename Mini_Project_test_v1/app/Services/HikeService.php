<?php

namespace App\Services;

use App\Models\Hike;

class HikeService
{
    public function getHikesWithReviews()
    {
        return Hike::with(['user', 'reviews.suggestions'])->get();
    } 

    public function incrementHikeViews(Hike $hike)
    {
        $hike->increment('views');
    }

    public function incrementReviewViews(Hike $hike)
    {
        foreach ($hike->reviews as $review) {
            $review->increment('views');
        }
    }

    public function updateReviewSuggestions($review, array $suggestionIds)
    {
        $review->suggestions()->sync($suggestionIds);
    }
}
