<?php

namespace App\Http\Controllers;

use App\Models\Hike;
use App\Services\HikeService;

class HikeController extends Controller
{
    protected $hikeService;

    public function __construct(HikeService $hikeService)
    {
        $this->hikeService = $hikeService;
    }

    public function index()
    {
        $hikes =  $this->hikeService->getHikesWithReviews();

        $recommended = [];

        foreach ($hikes as $hike) {
            if ($hike->review->count() > 10) {
                $recommended[$hike->id] = '🔥🔥🔥🔥🔥✨✨recommended';
            } else {
                $recommended[$hike->id] = null;
            }
        }

      return view('hikes.index',compact('hikes','recommended'));
    }
}
 