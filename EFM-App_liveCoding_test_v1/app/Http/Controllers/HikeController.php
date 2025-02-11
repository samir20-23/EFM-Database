<?php

namespace App\Http\Controllers;

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
        $hikes =  $this->hikeService->with(); 
        foreach ($hikes as $hike) {
            $this->hikeService->incrementHikeViews($hike);
            $this->hikeService->incrementReviewsViews($hike);
            
            
            // Automatically add suggestion "Randonnée Recommandée" if more than 10 positive reviews
            if ($hike->reviews->where('views', '>', 0)->count() > 10) {
                $hike->reviews->each(function ($review) {
                    $review->suggestions()->firstOrCreate(['content' => 'Randonnée Recommandée']);
                });
            }
        }
        return view('hikes.index', compact('hikes'));

        
    }

    public function create()
    {
        return view('hikes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'difficulty' => 'required|string',
        ]);

        $this->hikeService->create($data);

        return redirect()->route('hikes.index');
    }

    public function show($id)
    {
        $hike = $this->hikeService->getById($id);
        return view('hikes.show', compact('hike'));
    }

    public function edit($id)
    {
        $hike = $this->hikeService->getById($id);
        return view('hikes.edit', compact('hike'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'difficulty' => 'required|string',
        ]);

        $this->hikeService->update($id, $data);

        return redirect()->route('hikes.index');
    }

    public function destroy($id)
    {
        $this->hikeService->delete($id);
        return redirect()->route('hikes.index');
    }
}
