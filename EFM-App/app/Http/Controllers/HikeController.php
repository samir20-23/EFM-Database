<?php

namespace App\Http\Controllers;

use App\Models\Hike;
use App\Services\HikeService;
use Illuminate\Http\Request;

class HikeController extends Controller
{
    protected $hikeService;

    public function __construct(HikeService $hikeService)
    {
        $this->hikeService = $hikeService;
    }

    public function index()
    {
        $hikes = $this->hikeService->getHikesWithReviews();
        $recommended = [];
        foreach ($hikes as $hike) { 
            $this->hikeService->incrementReviewViews($hike);
            $this->hikeService->incrementHikeViews($hike);
 
            if ($hike->reviews->count() >= 10) {
                $recommended[$hike->id] = 'Randonnée Recommandée';
            } else {
                $recommended[$hike->id] = null;
            }
        }

        return view('hikes.index', compact('hikes', 'recommended'));
    }
 
    public function show($id)
    {
        $hike = Hike::with(['user', 'reviews.suggestions'])->findOrFail($id); 
        $this->hikeService->incrementHikeViews($hike);
        return view('hikes.show', compact('hike'));
    }
}
