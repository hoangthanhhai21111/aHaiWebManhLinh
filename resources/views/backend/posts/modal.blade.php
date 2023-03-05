<!-- #modalFilterColumns -->
<div class="modal fade" id="modalFilterColumns" tabindex="-1" role="dialog" aria-labelledby="modalFilterColumnsLabel"
    aria-hidden="true">
    <!-- .modal-dialog -->
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <!-- .modal-content -->
        <div class="modal-content" style="height: fit-content;">
            <!-- .modal-header -->
            <div class="modal-header">
                <h5 class="modal-title" id="modalFilterColumnsLabel"> Lọc nâng cao </h5>
            </div><!-- /.modal-header -->
            <!-- .modal-body -->
            <div class="modal-body">
                <!-- #filter-columns -->
                <div id="filter-columns">
                    <!-- .form-row -->
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Tiêu đề bài viết:</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text"><input type="text" name="name" value="{{ $f_name }}"
                                    class="form-control filter-column f-name" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Trạng thái:</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text">
                                <select name="status" id=""class="form-control filter-column f-name">
                                    <option value="">--Chọn Trạng thái--</option>
                                    <option value="0"{{ $f_status == '0' ? 'selected':''}}>Ẩn</option>
                                    <option value="1"{{ $f_status == '1' ? 'selected':''}}>Hiện</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row filter-row">
                        <div class="col-lg-4">
                            <label class="">Thể loại:</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input text">
                                <select name="category_id"
                                id=""class="form-control @error('category_id') is-invalid @enderror"
                                data-toggle="flatpickr">
                                <option value="">--chọn Thể loại-- </option>
                                @foreach ($categorys as $category)
                                    <option {{ $category->id == $f_category_id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div><!-- #filter-columns -->
                <!-- .btn -->
            </div><!-- /.modal-body -->
            <!-- .modal-footer -->
            <div class="modal-footer justify-content-start">
                <button type="submit" class="btn btn-primary" id="apply-filter">Áp dụng</button>
                <a href="{{ route('users.index') }}" class="btn btn-dark ">Đặt lại</a>
                <button type="button" data-dismiss="modal" class="btn btn-secondary ml-auto"
                    id="clear-filter">Hủy</button>
            </div><!-- /.modal-footer -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /#modalFilterColumns -->
