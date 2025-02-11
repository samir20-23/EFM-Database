<?php

namespace App\Services;

use App\Models\Hike;

class HikeService
{

    public function getAll()
    {
        return Hike::all();
    }

    public function getById($id)
    {
        return Hike::find($id);
    }

    public function create(array $data)
    {
        return Hike::create($data);
    }

    public function update($id, array $data)
    {
        $hike = Hike::find($id);
        if ($hike) {
            $hike->update($data);
        }
        return $hike;
    }

    public function delete($id)
    {
        $hike = Hike::find($id);
        if ($hike) {
            $hike->delete();
        }
        return $hike;
    }
    // part 2
    public function with()
    {
        return Hike::with(['reviews.suggestions'])->get();  
    }

    public function incrementHikeViews(Hike $hike)
    {
        $hike->views += 1;
        $hike->save();
    }

    public function incrementReviewsViews(Hike $hike)
    {
        foreach ($hike->reviews as $review) {
            $review->views += 1;
            $review->save();
        }
    }
}
