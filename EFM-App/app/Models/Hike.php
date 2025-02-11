<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hike extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'img_path', 'location', 'views', 'user_id'];
    
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
 
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function averageViews()
{
    return $this->reviews()->avg('views');
}
}
