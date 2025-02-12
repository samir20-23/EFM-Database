<?php

namespace App\Services;

use App\Models\Suggestion;

class SuggestionService
{
    public function getAll()
    {
        return Suggestion::all();
    }

    public function getById($id)
    {
        return Suggestion::find($id);
    }

    public function create(array $data)
    {
        return Suggestion::create($data);
    }

    public function update($id, array $data)
    {
        $hike = Suggestion::find($id);
        if ($hike) {
            $hike->update($data);
        }
        return $hike;
    }

    public function delete($id)
    {
        $hike = Suggestion::find($id);
        if ($hike) {
            $hike->delete();
        }
        return $hike;
    }
}
