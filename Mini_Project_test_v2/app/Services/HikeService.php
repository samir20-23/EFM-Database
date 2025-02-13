<?php

namespace App\Services;

use App\Models\Hike;
use App\Models\Review;

class HikeService
{
    public function getHikesWithReviews()
    {
        return Hike::with([
            'user',
            'reviews.user',
            'reviews.suggestions.user'
        ])->get();
    }

    public function incrementHikeViews(Hike $hike)
    {
        $hike->increment('views');
    }
}