@extends('backend.master')
@section('content')
<div class="page-inner">
    <header class="page-title-bar">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('banners.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản lý bài viết</a>
                </li>
            </ol>
        </nav>
        <h1 class="page-title">Thêm Bài Viết</h1>
    </header>
    <div class="page-section">
        <form method="post" action="{{ route('banners.update',$banner->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <legend>Thông tin cơ bản</legend>
                    <div class="row">
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
                        <br>

                    </div>
                    <div class="form-actions">
                        <a class="btn btn-secondary float-right" href="{{ route('banners.index') }}">Hủy</a>
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
