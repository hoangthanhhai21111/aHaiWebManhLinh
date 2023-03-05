@extends('backend.master')
@section('content')
    <div class="card">
        <div class="md-3">
            <a href="{{ route('posts.index') }}" class="btn btn-danger btn-rounded waves-effect waves-light ">
                <i class=" fas fa-reply-all"></i>
                Quay Lại</a>
        </div>
        <div class="row g-0">
            <div class="col-md-6 border-end">
                <div style="text-align: center" class="d-flex flex-column justify-content-center">
                    <div class="main_image">
                        <img src="{{ asset($posts->image) }}" id="main_product_image" height="60%" width="60%">
                    </div> <br>
                    <div class="thumbnail_images">
                        <ul id="thumbnail">
                            <li>
                                @foreach ($posts->imagePost as $image)
                                    <img onclick="changeImage(this)" src="{{ asset($image->image) }}" height="100px"
                                        width="90px">
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 right-side">
                    <div class="d-flex justify-content-between align-items-center">
                        <table>
                            <tr style="text-align:ligth">
                                <th style="width: 150px">
                                    <h4><b>Tiêu đề :</b></h4>
                                </th>
                                <td>
                                    <h4><b class="text-uppercase">{{ $posts->title }}</b></h4>
                                </td>
                            </tr>
                            <tr style="text-align:ligth">
                                <th style="width: 150px  ">
                                    <h4><b>Trạng thái:</b></h4>
                                </th>
                                <td>
                                    <h4><b class="text-uppercase">{{ $posts->status == 0 ? 'Ẩn' : 'Hiện' }}</b></h4>
                                </td>
                            </tr>
                            <tr style="text-align:ligth">
                                <th style="width: 150px  ">
                                    <h4><b>Ảnh bìa:</b></h4>
                                </th>
                                <td>
                                    <h4><img src="{{ asset($posts->image) }}" alt="" width="50%"></h4>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="ratings d-flex flex-row align-items-center">
                        <div class="d-flex flex-row">

                        </div>
                    </div>

                </div>
            </div>
            <div class="container">
                <div class="product-info-tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description"
                                role="tab" aria-controls="description" aria-selected="true">Nôi dung</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                                aria-controls="review" aria-selected="false">Đánh giá (0)</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            {!! $posts->content !!}
                        </div>
                        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                            <div class="review-heading">Đánh giá</div>
                            <p class="mb-20">Hiện tại chưa có đánh giá nào</p><br><br>
                            <div class="form-group">
                                <label>Đánh giá của bạn</label>
                                <div class="reviews-counter">
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
