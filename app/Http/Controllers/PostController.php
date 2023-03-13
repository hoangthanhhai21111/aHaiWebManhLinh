<?php
namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\ImagePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    function index(Request $request)
    {
        $categorys = Category::all();
        $key                    = $request->key ?? '';
        $name                   = $request->name ?? '';
        $status                 = $request->status ?? '';
        $category_id            = $request->category_id ?? '';
        $query = Post::query(true);
        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%')->where('deleted_at', '=', null);
        }
        if ($key) {
            $query->orWhere('id', $key)->where('deleted_at', '=', null);
            $query->orWhere('title', 'LIKE', '%' . $key . '%')->where('deleted_at', '=', null);
        }
        if ($category_id) {
            $query->where('category_id',$category_id)->where('deleted_at', '=', null);
        }
        if ($category_id) {
            $query->where('status',$status)->where('deleted_at', '=', null);
        }
        $posts = $query->orderBy('id', 'DESC')->where('deleted_at', '=', null)->paginate(5);
        $params = [
            'f_name'         => $name,
            'f_key'          => $key,
            'posts'          => $posts,
            'f_status'          => $status,
            'categorys'          => $categorys,
            'f_category_id'      => $category_id,
        ];
        return view('backend.posts.index', $params);
    }
    function create()
    {
        $categorys = Category::all();
        return view('backend.posts.create', compact('categorys'));
    }
    function store(StorePostRequest $request)
    {

        try {
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->status = $request->status;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $path = 'storage/' . $request->file('image')->store('Post', 'public'); //lưu file vào mục public/images với tê mới là $newFileName
            $post->image = $path;
        }
        $post->save();
        if ($request->hasFile('file_names')) {
            $imge = $request->file_names;
            ImagePost::where('post_id', '=', $post->id)->delete();
            foreach ($imge as $file_detail) {
                // File::delete($product->file_names()->file_name);
                $detail_path = 'storage/' . $file_detail->store('/PostImage', 'public');
                $post->ImagePost()->saveMany([
                    $imgae = new ImagePost([
                        'post_id' => $post->id,
                        'image' => $detail_path,
                    ]),

                ]);
            }
        }
        return redirect()->route('posts.index')->with('success',' Tạo mới thành công');
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return redirect()->route('posts.trash')->with('error','Tạo mới không thành công');
    }
    }
    public function show($id)
    {
        $posts = Post::find($id);
        return view('backend.posts.show', compact('posts'));
    }
    function edit($id)
    {
        $categorys = Category::all();
        $posts = Post::find($id);
        return view('backend.posts.edit', compact('posts','categorys'));
    }
    function update(UpdatePostRequest $request,$id){
        try {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->status = $request->status;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        if ($request->hasFile('image')) {
            $img = str_replace('storage', 'public',$post->image);
            Storage::delete($img);
            $file = $request->image;
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $path = 'storage/' . $request->file('image')->store('Post', 'public'); //lưu file vào mục public/images với tê mới là $newFileName
            $post->image = $path;
        }
        $post->save();
        if ($request->hasFile('file_names')) {
            $items = ImagePost::where('post_id', '=', $post->id)->get();
            foreach($items as $item){
                $im = str_replace('storage', 'public',$item->image);
                Storage::delete($im);
            }
            $imge = $request->file_names;
            ImagePost::where('post_id', '=', $post->id)->delete();
            foreach ($imge as $file_detail) {
                // File::delete($product->file_names()->file_name);
                $detail_path = 'storage/' . $file_detail->store('/PostImage', 'public');
                $post->ImagePost()->saveMany([
                    $imgae = new ImagePost([
                        'post_id' => $post->id,
                        'image' => $detail_path,
                    ]),
                ]);
            }
        }
        return redirect()->route('posts.index')->with('success','cập nhật thành công');
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return redirect()->route('posts.trash')->with('error','cập nhật không thành công');
    }
    }
    function softDeletes($id){
        try {
        $post = post::findOrFail($id);
        $post->deleted_at = date("Y-m-d h:i:s");
        $post->status = 0;
         $post->save();
         return redirect()->route('posts.index')->with('success','xóa thành công');
     } catch (\Exception $e) {
        Log::error($e->getMessage());
        return redirect()->route('posts.index')->with('error','xóa không thành công');
     }
    }
    function trash(Request $request){
        $categorys = Category::all();
        $key                    = $request->key ?? '';
        $name                   = $request->name ?? '';
        $status                 = $request->status ?? '';
        $category_id            = $request->category_id ?? '';
        $query = Post::query(true);
        if ($name) {
            $query->where('title', 'LIKE', '%' . $name . '%')->where('deleted_at', '!=', null);
        }
        if ($key) {
            $query->orWhere('id', $key)->where('deleted_at', '=', null);
            $query->orWhere('title', 'LIKE', '%' . $key . '%')->where('deleted_at', '!=', null);
        }
        if ($category_id) {
            $query->where('category_id',$category_id)->where('deleted_at', '=', null);
        }
        if ($category_id) {
            $query->where('status',$status)->where('deleted_at', '=', null);
        }
        $posts = $query->orderBy('id', 'DESC')->where('deleted_at', '!=', null)->paginate(5);
        $params = [
            'f_name'         => $name,
            'f_key'          => $key,
            'posts'          => $posts,
            'f_status'          => $status,
            'categorys'          => $categorys,
            'f_category_id'      => $category_id,
        ];
        return view('backend.posts.trash', $params);
    }
    function RestoreDelete($id)
    {
       try {
           $post = post::findOrFail($id);
           $post->deleted_at = null;
            $post->save();
            return redirect()->route('posts.trash')->with('success','khôi phục thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('posts.trash')->with('error','khôi phục không thành công');
        }
    }
    function destroy($id){
        try {
            $posts = post::find($id);
            $items = ImagePost::where('post_id', '=', $posts->id)->get();
            foreach($items as $item){
                $im = str_replace('storage', 'public',$item->image);
                Storage::delete($im);
                $item->delete();
            }
            $image = str_replace('storage', 'public', $posts->image);
            Storage::delete($image);
            $posts->forceDelete();
            Session::flash('success', 'Xóa thành công');
            return redirect()->route('posts.trash');
         } catch (\Exception $e) {
             Log::error($e->getMessage());
             return redirect()->route('posts.trash')->with('error', 'xóa không thành công');
         }
    }
}
