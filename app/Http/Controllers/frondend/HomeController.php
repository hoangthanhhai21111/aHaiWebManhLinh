<?php

namespace App\Http\Controllers\frondend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\ImagePost;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $banners = Banner::all();
        $gioithieu = Post::all()->where('category_id', '=',1)->where('status',1)->where('deleted_at',null);
        $thongbaos = Post::all()->where('status',1)->where('category_id', '=',2)->where('deleted_at',null);
        $tintucs =Post::all()->where('status',1)->where('category_id', '=',3)->where('deleted_at',null);
        $anhs =  ImagePost::orderBy('id', 'DESC')->paginate(4);
        $videos = Video::all();
        return view('frondend.home.home', compact('banners','gioithieu','thongbaos','tintucs','anhs','videos'));
    }
    function tintuc(){
        $tintucs =Post::orderBy('id', 'DESC')->where('status',1)->where('deleted_at',null);
        return view('frondend.home.tintuc',compact('tintucs'));
    }
}
