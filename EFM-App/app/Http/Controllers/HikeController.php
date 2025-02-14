<?php

namespace App\Http\Controllers;


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
    //   
    $colors = $this->hikeService->getReviewsColorBasedOnViews($hikes);

        // 
        foreach ($hikes as $hike) {
            if ($hike->reviews->count() >= 10) {
                $recommended[$hike->id] = '🔥🔥🔥Randonnée Recommandée🔥';
            } else {
                $recommended[$hike->id] = null; 
            }
        }

        return view('hikes.index', compact('hikes', 'recommended', 'colors'));
    }

    public function show($id)
    {
        $hike = $this->hikeService->getHikesWithReviews()->findOrFail($id);
        $this->hikeService->incrementHikeViews($hike);
        return view('hikes.show', compact('hike'));
    }
}
