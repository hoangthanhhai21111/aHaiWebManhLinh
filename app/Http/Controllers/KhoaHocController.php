<?php

namespace App\Http\Controllers;

use App\Models\KhoaHoc;
use Illuminate\Http\Request;

class KhoaHocController extends Controller
{
   function index(){
    $khoahocs = KhoaHoc::all();
    return view('backend.khoahoc.index', compact('khoahocs'));
   }
}
