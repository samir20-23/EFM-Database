<?php

namespace App\Services;

use App\Models\review;

class ReviewService
{
    public function incrementReviewViews(Review $review)
    {
        $review->increment('views');
    }

    public function updateReviewSuggestions(Review $review, array $suggestionsIds)
    {
        $review->suggestions()->sync($suggestionsIds);
    }
}
