<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Suggestion;
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
        $review = Review::with('suggestions')->findOrFail($id);
        $allSuggestions = Suggestion::all();
        return view('reviews.edit', compact('review', 'allSuggestions'));
    }

   
    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $suggestions = $request->input('suggestions', []);
        $this->hikeService->updateReviewSuggestions($review, $suggestions);
        return redirect()->back()->with('success', 'Review suggestions updated successfully.');
    }
 
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->back()->with('success', 'Review deleted successfully.');
    }

   
    public function show($id)
    {
        $review = Review::with('suggestions')->findOrFail($id); 
        $this->hikeService->incrementSingleReviewView($review);
        return view('reviews.show', compact('review'));
    }
}
