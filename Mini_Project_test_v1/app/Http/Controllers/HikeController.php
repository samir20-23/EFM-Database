<?php
namespace App\Http\Controllers;

use App\Services\HikeService;
use App\Models\Hike;
use Illuminate\Http\Request;

class HikeController extends Controller
{
    protected $service;

    public function __construct(HikeService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $hikes = $this->service->getHikesWithReviews();
        $recommended = [];
        foreach ($hikes as $hike) {
            $this->service->incrementHikeViews($hike);
            $this->service->incrementReviewViews($hike);
            if ($hike->reviews->where('positive', true)->count() > 10) {
                $recommended[$hike->id] = "Hike Recommended";
            } else {
                $recommended[$hike->id] = null;
            }
        }
        return view('hikes.index', compact('hikes', 'recommended'));
    }

    public function incrementHikeViews($id)
    {
        $hike = Hike::find($id);
        if ($hike) {
            $this->service->incrementHikeViews($hike);
            return response()->json([
                'success' => true,
                'views' => $hike->views
            ]);
        }

        return response()->json(['success' => false]);
    }

    // Add other methods as needed
}
