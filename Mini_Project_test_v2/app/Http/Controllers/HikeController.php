<?php

namespace App\Http\Controllers;

use App\Models\hike;
use Illuminate\Http\Request;
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
        $hikes = $this->hikeService->getHikesWithReviews();

        $recommended = [];
        foreach ($hikes as $hike) {
            if ($hike->reviews->count() >= 5) {
                $recommended[$hike->id] = 'RECOMMENDED HIKE !!!';
            } else {
                $recommended[$hike->id] = null;
            }
        }

        return view('home', compact('hikes', 'recommended'));
    }

    public function incrementViews(Hike $hike)
    {
        $this->hikeService->incrementHikeViews($hike);
        return redirect()->route('hikes.show', $hike->id); // Redirect to show details after incrementing views
    }

    /**
     * Display the specified resource.
     */
    public function show(Hike $hike)
    {
        // Load the related reviews and suggestions
        $hike->load(['reviews.user', 'reviews.suggestions.user']);
        $this->hikeService->incrementHikeViews($hike);
        return view('hikes.show', compact('hike'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hike $hike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, hike $hike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hike $hike)
    {
        //
    }
}
