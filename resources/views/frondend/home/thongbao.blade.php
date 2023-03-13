@extends('frondend.layouts.master')
@section('content')
    <main id="main" class="">
        <div id="content" class="blog-wrapper blog-archive page-wrapper">
            <div class="row align-center">
                <div class="large-10 col">
                    <div id="row-333920144" class="row large-columns-3 medium-columns- small-columns-1 row-masonry"
                        data-packery-options='{"itemSelector": ".col", "gutter": 0, "presentageWidth" : true}'>
                        @foreach ($thongbaos as $thongbao)
                        <div class="col post-item">
                            <div class="col-inner">
                                <a href="{{ route('home.show',$thongbao->id) }}" class="plain">
                                    <div class="box box-text-bottom box-blog-post has-hover">
                                        <div class="box-image">
                                            <div class="image-cover" style="padding-top: 56%">
                                                <img width="650" height="400"
                                                    src="{{ asset($thongbao->image) }}"
                                                    class="attachment-medium size-medium wp-post-image"
                                                    alt="Mặt Bằng TNR Stars Đồng Hới" loading="lazy"
                                                    sizes="(max-width: 650px) 100vw, 650px" />
                                            </div>
                                        </div>
                                        <div class="box-text text-left">
                                            <div class="box-text-inner blog-post-inner">
                                                <h5 class="post-title is-large">
                                                    {{ $thongbao->title }}
                                                </h5>
                                                <div class="is-divider"></div>
                                                <p class="from_the_blog_excerpt">
                                                    {!! Str::words($thongbao->description,20) !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="badge absolute top post-date badge-outline">
                                            <div class="badge-inner">
                                                <span class="post-date-day">{{ $thongbao->updated_at->format('d')??$thongbao->created_at->format('d') }}</span><br />
                                                <span class="post-date-month is-xsmall">{{$thongbao->updated_at->format('d')?? $thongbao->created_at->format('m') }}</span>
                                                <span class="post-date-month is-xsmall">{{ $thongbao->created_at->format('y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <ul class="page-numbers nav-pagination links text-center">
                           <h1 class="btn">{{$thongbaos->links()}}</h1>
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
