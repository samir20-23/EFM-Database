<?php

namespace App\Http\Controllers;

use App\Services\HikeService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $hikeService;

    public function __construct(HikeService $hikeService)
    {
        $this->hikeService = $hikeService;
    }


    public function edit($id)
    {
        $review = $this->hikeService->getReviewsWithSuggestions($id);
        $allSuggestions = $this->hikeService->all();
        return view('reviews.edit', compact('review', 'allSuggestions'));
    }


    public function update(Request $request, $id)
    {
        $review = $this->hikeService->findOrFail($id);
        $suggestions = $request->input('suggestions', []);
        $this->hikeService->updateReviewSuggestions($review, $suggestions);
        return redirect()->back()->with('success', 'Review suggestions updated successfully.');
    }

    public function destroy($id)
    {
        $review = $this->hikeService->findOrFail($id);
        $review->delete();
        return redirect()->back()->with('success', 'Review deleted successfully.');
    }

    public function show($id)
    {
        $hikes = $this->hikeService->getHikesWithReviews();
        foreach ($hikes as $hike) {
            $this->hikeService->incrementReviewViews($hike);
        }
        
        $review = $this->hikeService->getReviewsWithSuggestions($id);
        $this->hikeService->incrementSingleReviewView($review);
        return view('reviews.show', compact('review'));
        
    }
}
