<?php

namespace App\Http\Controllers\frondend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\ImagePost;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index()
    {
        $banners = Banner::all();
        $gioithieu = Post::all()->where('category_id', '=',1)->where('status',1)->where('deleted_at',null);
        $thongbaos = Post::all()->where('status',1)->where('category_id', '=',2)->where('deleted_at',null);
        $tintucs =Post::all()->where('status',1)->where('category_id', '=',3)->where('deleted_at',null);
        $anhs =  ImagePost::orderBy('id', 'DESC')->paginate(4);
        $videos = Video::all();
        return view('frondend.home.home', compact('banners','gioithieu','thongbaos','tintucs','anhs','videos'));
    }

    function tintuc()
    {
        $query=Post::query(true);
        $query->where('status',1)->where('deleted_at',null)->where('category_id', '=',3);
        $tintucs = $query->orderBy('id', 'DESC')->paginate(9);
        return view('frondend.home.tintuc',compact('tintucs'));
    }

    function show($id)
    {
        $query = Post::query(true);
        $shows = $query->where('id',$id)->where('status',1)->where('deleted_at',null)->get();
        $top10 =  DB::table('posts');
        foreach ($shows as $show){
        $top10  = DB::table('posts')->select('*')->where('category_id', '=',$show->category_id)->orderBy('id', 'DESC')->where('status',1)->paginate(5);
         }
    return view('frondend.home.show', compact('shows','top10'));
    }

    Function thongbao()
    {
        $thongbaos = DB::table('posts')->select('*')->where('category_id', '=',2)->where('status',1)->where('deleted_at','!=', null)->orderBy('id', 'DESC')->paginate(5);
        // dd( $thongbao);
        return view('frondend.home.thongbao', compact('thongbaos'));
    }
    function dangky(){
        return view('frondend.home.dangky');
    }
}
