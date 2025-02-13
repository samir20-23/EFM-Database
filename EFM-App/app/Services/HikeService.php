<?php

namespace App\Services;

use App\Models\Hike;
use App\Models\Review;

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
            foreach ($review->suggestions as $suggestion) {
                $suggestion->increment('views');
            }
        }
    }
    
  
    public function incrementSingleReviewView(Review $review)
    {
        $review->increment('views');
        foreach ($review->suggestions as $suggestion) {
            $suggestion->increment('views');
        }
    }

   
    public function updateReviewSuggestions(Review $review, array $suggestionIds)
    {
        $review->suggestions()->sync($suggestionIds);
    }
}
