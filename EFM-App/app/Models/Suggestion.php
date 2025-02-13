<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;

    protected $fillable = [
      'content',
      'views',
      'user_id'
    ];

    public function reviews()
    {
        return $this->belongsToMany(Review::class);
    }
}
