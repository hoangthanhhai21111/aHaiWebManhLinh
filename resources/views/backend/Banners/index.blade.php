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
                <h1 class="page-title mr-sm-auto">Quản lý Sự Kiện</h1>
                <div class="btn-toolbar">
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
                    </ul>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="" method="GET" id="form-search">
                                <a href="{{ route('banners.create') }}" class="btn btn-primary mr-2">
                                    <i class="fa-solid fa fa-plus"></i>
                                    <span class="ml-1">Thêm Mới</span>
                                </a>
                            </form>
                        </div>
                    </div>
                    <div class="container col-12">
                        @if (!count($banners))
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
                            <!-- thead -->
                            <thead class="thead-">
                                <tr>
                                    <th style="min-width:50px"> #</th>
                                    <th>
                                        <H6>Ảnh Bìa</H6>
                                    </th>
                                    <th>
                                        <H6>Tùy Chọn </H6>
                                    </th>
                                </tr>
                            </thead><!-- /thead -->
                            <tbody>
                                @foreach ($banners as $key => $banner)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>
                                            <img class="image_photo rounded-circle" src="{{ asset($banner->image) }}"
                                                style="width:75px;height:75px">
                                        </td>
                                        <td>
                                            <form action="{{ route('banners.destroy', $banner->id) }}" method="post">
                                                {{-- @can('update', App\Models\User::class)
                                            @endcan --}}
                                                <a href="{{ route('banners.edit', $banner->id) }}"
                                                    class="btn btn-sm btn-icon btn-secondary"><i
                                                        class="fa fa-pencil-alt"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                {{-- @can('forceDelete', App\Models\User::class) --}}
                                                <button type="submit" class="btn btn-sm btn-icon btn-secondary"
                                                    onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i
                                                        class="far fa-trash-alt"></i></button>
                                                {{-- @endcan --}}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody><!-- /tbody -->
                        </table>
                        {{-- {{ $banners->onEachSide(5)->links()}} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
