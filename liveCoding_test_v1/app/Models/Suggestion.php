<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;
    protected $fillable = ['content','views'];
 
    public function review(){
        return $this->belongsTo(Review::class);
    } 
}
