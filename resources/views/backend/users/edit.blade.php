@extends('backend.master')
@section('content')
<div class="page-inner">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href=""><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang danh
                    sách</a>
            </li>
        </ol>
    </nav>
    <header class="page-title-bar">
        <h1 class="page-title">Thêm Nhân Viên </h1>
    </header>
    <div class="page-section">
        <div class="card-deck-xl">
            <div class="card card-fluid">
                <div class="card-body">
                    <form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="control-label" for="flatpickr01">Tên Nhân Viên</label>
                            <input id="flatpickr01" type="text" class="form-control" placeholder="vui lòng nhập"
                                value="{{ $user->name }}" name="name" data-toggle="flatpickr">
                        </div>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                        <div class="form-group">
                            <label class="control-label" for="flatpickr01">Email</label>
                            <input id="flatpickr01" type="text" class="form-control" placeholder="vui lòng nhập"
                                value="{{ $user->email }}" name="email" data-toggle="flatpickr">
                        </div>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('email') }}</p>
                        @endif
                        <div class="form-group">
                            <label class="control-label" for="flatpickr01">Nhóm</label>
                            <select name="group_id"
                                id=""class="form-control @error('group_id') is-invalid @enderror"
                                data-toggle="flatpickr">
                                <option value="">Chọn Nhóm</option>
                                @foreach ($groups as $group)
                                    <option {{ $group->id == $user->group_id ? 'selected' : '' }}
                                        value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('group_id') }}</p>
                        @endif
                        <div class="form-group">
                            <label class="control-label" for="flatpickr01">Ảnh Đại Diện</label><br>
                            <input accept="image/*" type='file' id="inputFile" name="avatar" class="form-control" /><br><br>
                            <br>
                            <img type="hidden" width="90px" height="90px" id="blah" src="{{asset($user->avatar)}}" alt="" />
                        </div>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('avatar') }}</p>
                        @endif
                        <div class="form-actions">
                            <a class="btn btn-secondary float-right" href="{{ route('users.index') }}">Hủy</a>
                            <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
