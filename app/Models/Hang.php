<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hang extends Model
{
    use HasFactory;
    function KhoaHoc()
    {
        return $this->hasMany(KhoaHoc::class);
    }
}
