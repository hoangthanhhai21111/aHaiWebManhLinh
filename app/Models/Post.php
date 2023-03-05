<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    function imagePost()
    {
        return $this->hasMany(ImagePost::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
