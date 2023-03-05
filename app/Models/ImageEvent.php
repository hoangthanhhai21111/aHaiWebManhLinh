<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageEvent extends Model
{
    use HasFactory;
    protected $table = 'image_events';
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
