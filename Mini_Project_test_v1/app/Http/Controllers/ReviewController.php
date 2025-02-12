<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Suggestion;
use App\Services\HikeService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $service;

    public function __construct(HikeService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        $review = Review::all(); // Retrieve all reviews
        return view('reviews.edit', compact('review')); // Return the view with the reviews
    }
    public function edit($id)
    {
        $review = Review::with('suggestions')->findOrFail($id);
        $suggestions = Suggestion::all();
        return view('reviews.edit', compact('review', 'suggestions'));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $suggestionIds = $request->input('suggestions', []);
        $this->service->updateReviewSuggestions($review, $suggestionIds);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->back();
    }
}
