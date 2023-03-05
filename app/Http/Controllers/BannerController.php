<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
     function index(){
        $banners = Banner::all();
        // dd($banners);
        return view('backend.banners.index', compact('banners'));
     }
     function create(){
        return view('backend.banners.create');
     }
     function Store(Request $request){
        try{
            $banner = new Banner();
            if ($request->hasFile('image')){
                $file = $request->image;
                $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
                $fileName = time(); //45678908766 tạo tên file theo thời gian
                $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
                $path = 'storage/' . $request->file('image')->store('imageBanner', 'public'); //lưu file vào mục public/images với tê mới là $newFileName
                $banner->image = $path;
            }
            $banner->save();
       return redirect()->route('banners.index')->with('success',' thêm mới thành công');
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return redirect()->route('banners.index')->with('error','thêm mới không thành công');
    }
     }
     function edit($id){
        $banner = Banner::find($id);
        return view('backend.banners.edit',compact('banner'));
     }
     function update(Request $request, $id){

        try{
        $banner = Banner::find($id);
        if ($request->hasFile('image')){
            $image = str_replace('storage', 'public', $banner->image);
            Storage::delete($image);
            $file = $request->image;
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $path = 'storage/' . $request->file('image')->store('imageBanner', 'public'); //lưu file vào mục public/images với tê mới là $newFileName
            $banner->image = $path;
        }
        $banner->save();
        return redirect()->route('banners.index')->with('success',' Cập nhật thành công');
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return redirect()->route('banners.index')->with('error','Cập nhật không thành công');
    }
     }
     function destroy($id){

        try{
            $banner = Banner::findOrFail($id);
            $image = str_replace('storage', 'public', $banner->image);
            Storage::delete($image);
            $banner->delete();
            return redirect()->route('banners.index')->with('success',' Xóa thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('banners.index')->with('error','Xóa không thành công');
        }

     }
}
