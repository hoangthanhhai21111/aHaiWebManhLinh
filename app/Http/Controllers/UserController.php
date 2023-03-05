<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
     function index(Request $request){
       $groups=Group::all();
        $key                    = $request->key ?? '';
        $name                   = $request->name ?? '';
        $email                  = $request->email  ?? '';
        $group_id                  = $request->group_id  ?? '';
        // thực hiện query
        $query = User::query(true);

        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%')->where('deleted_at', '=', null);
        }
        if ($email) {
            $query->where('email', 'LIKE', '%' . $email . '%')->where('deleted_at', '=', null);
        }
        if ($group_id) {
            $query->where('group_id',$group_id)->where('deleted_at', '=', null);
        }
        if ($key) {
            $query->orWhere('id', $key)->where('deleted_at', '=', null);
            $query->orWhere('name', 'LIKE', '%' . $key . '%')->where('deleted_at', '=', null);
            $query->orWhere('email', 'LIKE', '%' . $key . '%')->where('deleted_at', '=', null);
        }
        $users = $query->orderBy('id', 'DESC')->where('deleted_at', '=', null)->paginate(5);
        $params = [
            'f_name'         => $name,
            'f_key'          => $key,
            'f_email'        => $email,
            'users'          => $users,
            'groups'         => $groups,
            'f_group_id'     => $group_id
        ];
        return view('backend.users.index',$params);

     }
     function create(Request $request){
        $groups = Group::all();
        return view('backend.users.create',compact('groups'));
     }
     function store(StoreUserRequest $request){
        // dd($request->all());
           $user= new User();
           $user->name = $request->name;
           $user->email = $request->email ;
           $user->password= bcrypt('admin');
        //    $user->avatar='1234512345678';
           $user->Group_id = $request->group_id;
           if ($request->hasFile('avatar')){
            $file = $request->avatar;
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $path = 'storage/' . $request->file('avatar')->store('avatar', 'public'); //lưu file vào mục public/images với tê mới là $newFileName
            $user->avatar = $path;
        }
           $user->save();
           return redirect()->route('users.index');
     }
     function edit($id) {
        $user = User::find($id);
        $groups = Group::all();
        return view('backend.users.edit',compact('user','groups'));
     }
     function update(UpdateUserRequest $request, $id) {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->Group_id = $request->group_id;
        if ($request->hasFile('avatar')){
            $image = str_replace('storage', 'public', $user->avatar);
            Storage::delete($image);
            $file = $request->avatar;
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $path = 'storage/' . $request->file('avatar')->store('avatar', 'public'); //lưu file vào mục public/images với tê mới là $newFileName
            $user->avatar = $path;
        }
           $user->save();
           return redirect()->route('users.index');

     }
     function softDeletes($id){
        try {
        $user = User::findOrFail($id);
        $user->deleted_at = date("Y-m-d h:i:s");

         $user->save();
         return redirect()->route('users.index')->with('success','xóa thành công');
     } catch (\Exception $e) {
         Log::error($e->getMessage());
         return false;
     }
     }
     function trash(Request $request){
        $key                    = $request->key ?? '';
        $name                   = $request->name ?? '';
        $id                     = $request->id ?? '';
        $email                  = $request->email  ?? '';
        $query = User::query(true);

        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%')->where('deleted_at', '!=', null);
        }
        if ($email) {
            $query->where('email', 'LIKE', '%' . $email . '%')->where('deleted_at', '!=', null);
        }
        if ($id) {
            $query->where('id', $id)->where('deleted_at', '!=', null);
        }
        if ($key) {
            $query->orWhere('id', $key)->where('deleted_at', '!=', null);
            $query->orWhere('name', 'LIKE', '%' . $key . '%')->where('deleted_at', '!=', null);
            $query->orWhere('email', 'LIKE', '%' . $key . '%')->where('deleted_at', '!=', null);
        }
        $users = $query->orderBy('id', 'DESC')->where('deleted_at', '!=', null)->paginate(5);
        $params = [
            'f_id'           => $id,
            'f_name'         => $name,
            'f_key'          => $key,
            'f_email'        => $email,
            'users'          => $users
        ];
        return view('backend.users.trash',$params);
     }
     function RestoreDelete($id)
     {
        try {
            $user = User::findOrFail($id);
            $user->deleted_at = null;
             $user->save();
             return redirect()->route('users.trash')->with('success','khôi phục thành công');
         } catch (\Exception $e) {
             Log::error($e->getMessage());
             return false;
         }
     }
     function destroy($id){
        try {
            $users = User::findOrFail($id);
            $image = str_replace('storage', 'public', $users->avatar);
            Storage::delete($image);
            $users->forceDelete();
            Session::flash('success', 'Xóa thành công');
            return redirect()->route('users.trash');
         } catch (\Exception $e) {
             Log::error($e->getMessage());
             return false;
         }
     }

}
