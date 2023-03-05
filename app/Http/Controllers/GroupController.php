<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $key                    = $request->key ?? '';
        $name                   = $request->name ?? '';
        $id                     = $request->id ?? '';
        $query = Group::select('*');
        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($id) {
            $query->where('id', $id);
        }
        if ($key) {
            $query->orWhere('id', $key);
            $query->orWhere('name', 'LIKE', '%' . $key . '%');
        }
        //Phân trang
        $groups = $query->paginate(5);
        $params = [
            'f_id'           => $id,
            'f_name'         => $name,
            'f_key'          => $key,
            'groups'          => $groups
        ];
        return view('backend.groups.index', $params);
    }
    public function create()
    {
        return view('backend.groups.create');
    }
    public function store(Request $request)
    {
        $group = new Group();
        $group->name = $request->name;
        $group->save();
        Session::flash('success', 'Thêm mới thành công');
        return redirect()->route('groups.index');
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $group = Group::find($id);
        $roles = Role::all()->toArray();
        $userRoles = $group->roles->pluck('id', 'name')->toArray();
        $group_names = [];
        foreach ($roles as $role) {
            $group_names[$role['group_name']][] = $role;
        }
        $params = [
            'group' => $group,
            'userRoles' => $userRoles,
            'group_names' => $group_names
        ];
        return view('backend.groups.edit', $params);
    }

    public function update(Request $request,  $id)
    {
        $group = Group::findOrFail($id);
        $group->name = $request->name;
        // $group->description = $request->description;
        // dd($request->all());
        try {
            $group->save();
            //detach xóa hết tất cả các record của bảng trung gian hiện tại
            $group->roles()->detach();
            //attach cập nhập các record của bảng trung gian hiện tại
            $group->roles()->attach($request->roles);
            //dung session de dua ra thong bao
            Session::flash('success', 'Cập nhật thành công');
            return redirect()->route('groups.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('groups.index')->with('error', 'Cập nhật' . ' ' . $request->name . ' ' .  ' không thành công');
        }
    }
    public function destroy($id)
    {
        try {
            $group = Group::findOrFail($id);
            $group->delete('$id');
            Session::flash('success', 'xóa thành công');
            return redirect()->route('groups.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('groups.index')->with('error', 'Người nào hoặc quyền nào đang ở chức vụ này!');
        }
    }
}
