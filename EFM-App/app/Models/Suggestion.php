<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    // A suggestion belongs to one review
    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    // A suggestion belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
