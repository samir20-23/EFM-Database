<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['content','views','hike_id'];
 
    public function hike(){
        return $this->belongsTo(Hike::class);
    }
    public function suggestions(){
        return $this->hasMany(Suggestion::class);
    }
}
