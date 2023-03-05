@extends('backend.master')
@section('content')
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('posts.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản lý bài viết</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title">Thêm video</h1>
        </header>
        <div class="page-section">
            <form method="post" action="{{ route('videos.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <legend>Thông tin cơ bản</legend>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label class="control-label @error('category_id') is-invalid @enderror"
                                    for="flatpickr01"><b>Link video*</b></label><br>
                                <input  type='text' id="inputFile" name="filename" class="form-control" />
                                @if ($errors->any())
                                    <p style="color:red">*{{ $errors->first('image') }}</p>
                                @endif
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
