<?php

namespace App\Services;

use App\Models\Hike;

class HikeService
{
    public function getHikesWithReviews()
    {
        return Hike::with(['user', 'review.suggestion'])->get();
    }
    public function incrementHikeViews($hike)
    {
        $hike->increment('views');
    }
    public function incrementReviewViews($hike)
    {
        foreach ($hike->reviews as $review) {
            $review->increment('views');
        }
    }
   
}
