@extends('backend.master')
@section('content')
<div class="page-inner">
    <header class="page-title-bar">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>
                </li>
            </ol>
        </nav>
        <div class="d-md-flex align-items-md-start">
            <h1 class="page-title mr-sm-auto">Danh mục chức vụ</h1>
            <div class="btn-toolbar">
                {{-- @can('create', App\Models\category::class) --}}
                {{-- <div class="input-group-prepend">
                    <button class="btn btn-secondary" type="button" data-toggle="modal"
                        data-target="#modalFilterColumns">Tìm nâng cao</button>
                </div>
                <div class="md-5 title_cate d-flex">
                    <div class="form-outline">
                        <form action="" method="GET" id="form-search">
                            <input type="search" value="{{ $f_key }}" name="key" id="form1"
                                class="form-control" placeholder="search..." />
                    </div>
                    <button type="submit" class="btn btn-primary  waves-effect waves-light ">
                        <i class="fas fa-search"></i>
                    </button>
                    </form>
                </div> --}}
                {{-- @endcan --}}
            </div>
        </div>
    </header>
    <div class="page-section">
        <div class="card card-fluid">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="">Tất Cả</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.trash') }}">Thùng rác</a>
                    </li> --}}
                </ul>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form action="" method="GET" id="form-search">
                                <a href="{{ route('groups.create') }}" class="btn btn-primary mr-2">
                                    <i class="fa-solid fa fa-plus"></i>
                                    <span class="ml-1">Thêm Mới</span>
                                </a>

                                {{-- @include('backend.layouts.modal') --}}
                        </form>

                    </div>
                </div>
                <div class="container col-12">
                    @if (!count($groups))
                    <p class="text-success">
                    <div class="alert alert-danger"> <i class="bi bi-x-circle"aria-hidden="true"></i>
                        không tìm thấy kết quả.
                    </div>
                    </p>
                @endif
                @if (Session::has('success'))
                    <p class="text-success">
                    <div class="alert alert-success"> <i class="fa fa-check" aria-hidden="true"></i>
                        {{ Session::get('success') }}</div>
                    </p>
                @endif
                @if (Session::has('error'))
                    <p class="text-danger">
                    <div class="alert alert-danger"> <i class="bi bi-x-circle"aria-hidden="true"></i>
                        {{ Session::get('error') }}</div>
                    </p>
                @endif
            </div>
                <div class="table-responsive">
                    <table class="table table-hover">

                        <thead class="thead-">
                            <tr>
                                <th style="min-width:50px"> #</th>
                                <th> <H6>Tên chức vụ </H6></th>
                                <th> <H6>Tùy Chọn </H6></th>
                            </tr>
                        </thead><!-- /thead -->
                        <tbody>
                             @foreach ($groups as $key => $group)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>

                                    <td>{{ $group->name }}</td>
                                    <td>
                                        <form action="{{ route('groups.destroy', $group->id) }}" method="post">
                                            {{-- @can('update', App\Models\User::class)
                                            @endcan --}}
                                            <a href="{{ route('groups.edit', $group->id) }}"
                                                class="btn btn-sm btn-icon btn-secondary"><i
                                                    class="fa fa-pencil-alt"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            {{-- @can('forceDelete', App\Models\User::class) --}}
                                            <button type="submit" class="btn btn-sm btn-icon btn-secondary"
                                                onclick="return confirm('Bạn chắc chắn muốn xóa chức vụ {{ $group->name }}?')"><i
                                                    class="far fa-trash-alt"></i></button>
                                            {{-- @endcan --}}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody><!-- /tbody -->
                    </table>
                    {{$groups->onEachSide(5)->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
