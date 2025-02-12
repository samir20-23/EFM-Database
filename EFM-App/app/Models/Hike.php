<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hike extends Model
{
    use HasFactory;
protected $fillable = ['id','title','description','views','user_id'];
public function user(){
    return $this->belongsTo(User::class);
}

public function review(){
    return $this->hasMany(Review::class);
}

}

