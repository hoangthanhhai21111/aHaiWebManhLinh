<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    function index(){
        $inmges = Image::all();
        dd('image');
        return view('backend.image.index');
    }
}
