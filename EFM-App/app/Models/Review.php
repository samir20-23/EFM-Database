<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'type', 'views'];

    // A review belongs to one hike
    public function hike()
    {
        return $this->belongsTo(Hike::class);
    }

    // A review can have many suggestions
    public function suggestions()
    {
        return $this->hasMany(Suggestion::class);
    }
}
