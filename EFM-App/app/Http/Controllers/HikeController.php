<?php

namespace App\Http\Controllers;

use App\Models\Hike;
use App\Services\HikeService;

class HikeController extends Controller
{
    protected $hikeService; 
    protected $recommended; 


    public function __construct(HikeService $hikeService)
    {
        $this->hikeService = $hikeService;
    }

    public function index()
    {
        $hikes = Hike::with('reviews')->get();
    
        $recommended = [];
    
        foreach ($hikes as $hike) {
            if ($hike->reviews->count() > 10) {
                $recommended[$hike->id] = '🔥🔥🔥🔥 Recommended';
            } else {
                $recommended[$hike->id] = null;
            }
        }
    
        return view('hikes.index', compact('hikes', 'recommended'));
    }
    
    
    
}

      