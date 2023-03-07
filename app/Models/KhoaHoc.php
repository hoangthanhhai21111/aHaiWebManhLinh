<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoaHoc extends Model
{
    use HasFactory;
    function Hang()
    {
        return $this->belongsTo(Hang::class);
    }
    function HocVien()
    {
        return $this->hasMany(HocVien::class);
    }
}
