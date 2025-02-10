<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hike extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'views'];

    // A hike belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A hike can have many reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
