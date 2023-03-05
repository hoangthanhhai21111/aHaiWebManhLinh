@extends('backend.master')
@section('content')
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('posts.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản lý bài
                            viết</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title">Thêm Bài Viết</h1>
        </header>
        <div class="page-section">
            <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <legend>Thông tin cơ bản</legend>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="tf1"><b>Tiêu đề</b><abbr name="Trường bắt buộc">*</abbr></label>
                                    <input name="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title') }}" placeholder="Nhập tiêu đề bài viết">
                                    @if ($errors->any())
                                        <p style="color:red">*{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="tf1"><b>Thể loại</b><abbr name="Trường bắt buộc">*</abbr></label>
                                    <select name="category_id" id="" class="form-control @error('category_id') is-invalid @enderror">
                                        <option value="">--Chọn thể loại bài--</option>
                                        @foreach ($categorys as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->any())
                                        <p style="color:red">*{{ $errors->first('category_id') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tf1"><b>Nội dung chính</b><abbr name="Trường bắt buộc">*</abbr></label>
                                <textarea name="content" class="form-control" value="" id="ckeditor1" rows="4" style="resize: none">{{ old('content') }}</textarea>
                                @if ($errors->any())
                                    <p style="color:red">*{{ $errors->first('content') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tf1"><b>Mô Tả</b><abbr name="Trường bắt buộc">*</abbr></label>
                                <textarea name="description" class=" ckeditor form-control" value="" id="ckeditor4" rows="4" style="resize: none">{{ old('content') }}</textarea>
                                @if ($errors->any())
                                    <p style="color:red">*{{ $errors->first('content') }}</p>
                                @endif
                            </div>
                        </div><br><br>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-2">
                                    <label for="tf1"><b>Trạng Thái</b><abbr name="Trường bắt buộc">*</abbr></label><br>
                                    <input type="radio" id="html" name="status" value="0">
                                    <label for="html">Ẩn </label>&nbsp
                                    <input type="radio" id="css" name="status" value="1">
                                    <label for="css">Hiện</label>&nbsp
                                    @if ($errors->any())
                                        <p style="color:red">*{{ $errors->first('status') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div> <br><br>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label class="control-label @error('category_id') is-invalid @enderror"
                                    for="flatpickr01"><b>Hìnhh Ảnh*</b></label><br>
                                <input accept="image/*" type='file' id="inputFile" name="image" /><br>
                                <br>
                                <img type="hidden" width="200px" height="200px" id="blah" src="#"
                                    alt="" />
                                @if ($errors->any())
                                    <p style="color:red">*{{ $errors->first('image') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-lg-8">
                                <label for="file_name"><b>Hình ảnh chi tiết*</b></label>
                                <div class="card_file_name">
                                    <div class="form-group form_input @error('file_names') border border-danger @enderror">
                                        <input type="file" name="file_names[]" id="file_name" multiple
                                            class="form-control files @error('file_name') is-invalid @enderror">
                                        <span class="inner">
                                            <span class="select" style="color:red">Ctrl + click để chọn nhiều ảnh</span>
                                        </span>
                                    </div>
                                    <div class="container_image">
                                        @error($errors->any())
                                            <p style="color:red">*{{ $errors->first('file_name') }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="form-actions">
                            <a class="btn btn-secondary float-right" href="{{ route('posts.index') }}">Hủy</a>
                            <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.file').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                    console.log(e);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    <script src="{{ asset('assets/js/uploadFile.js') }}"></script>
@endsection
