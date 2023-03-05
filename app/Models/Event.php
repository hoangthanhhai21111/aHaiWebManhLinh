<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    function imageEvents()
    {
        return $this->hasMany(ImageEvent::class);
    }
}
