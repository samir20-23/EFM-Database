<?php

namespace App\Services;

use App\Models\Review;

class ReviewService
{
    public function getAll()
    {
        return Review::all();
    }

    public function getById($id)
    {
        return Review::find($id);
    }

    public function create(array $data)
    {
        return Review::create($data);
    }

    public function update($id, array $data)
    {
        $hike = Review::find($id);
        if ($hike) {
            $hike->update($data);
        }
        return $hike;
    }

    public function delete($id)
    {
        $hike = Review::find($id);
        if ($hike) {
            $hike->delete();
        }
        return $hike;
    }
}
