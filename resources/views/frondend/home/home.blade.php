@extends('frondend.layouts.master')
@section('content')
    <main id="main" class="">
        <div id="content" role="main" class="content-area">
            <div class="img has-hover show-for-small x md-x lg-x y md-y lg-y" id="image_161992839">
                <div class="img-inner dark">
                    <img width="1020" height="680"
                        @foreach ($banners as $banner)
                 src="{{ asset($banner->image) }}" @endforeach
                        class="attachment-large size-large" alt="" loading="lazy"
                        srcset=" @foreach ($banners as $banner)
                                        {{ asset($banner->image) }} @endforeach "
                        sizes="(max-width: 1020px) 100vw, 1020px" />
                </div>
                <style>
                    #image_161992839 {
                        width: 100%;
                    }
                </style>
            </div>
            <div class="slider-wrapper relative hide-for-small" id="slider-530277262">
                <div class="slider slider-nav-circle slider-nav-large slider-nav-light slider-style-normal"
                    data-flickity-options='{
                "cellAlign": "center",
                "imagesLoaded": true,
                "lazyLoad": 1,
                "freeScroll": false,
                "wrapAround": true,
                "autoPlay": 6000,
                "pauseAutoPlayOnHover" : true,
                "prevNextButtons": true,
                "contain" : true,
                "adaptiveHeight" : true,
                "dragThreshold" : 10,
                "percentPosition": true,
                "pageDots": true,
                "rightToLeft": false,
                "draggable": true,
                "selectedAttraction": 0.1,
                "parallax" : 0,
                "friction": 0.6        }'>
                    @foreach ($banners as $banner)
                        <div class="img has-hover hide-for-small x md-x lg-x y md-y lg-y" id="image_1070052534">
                            <div class="img-inner image-cover dark" style="padding-top:650px;">
                                <img width="1020" height="421" src="{{ asset($banner->image) }}"
                                    class="attachment-large size-large" alt="" loading="lazy"
                                    sizes="(max-width: 1020px) 100vw, 1020px" />
                            </div>
                            <style>
                                #image_1070052534 {
                                    width: 100%;
                                }
                            </style>
                        </div>
                    @endforeach
                </div>
                <div class="loading-spin dark large centered"></div>
            </div>
            <section class="section" id="section_1734715175">
                <div class="bg section-bg fill bg-fill  bg-loaded">
                </div>
                <div class="section-content relative">
                    <div class="row row-small" id="row-817784054">
                        <div id="col-255652914" class="col small-12 large-12">
                            <div class="col-inner">
                                <div id="text-1863628793" class="text">
                                    <h1 style="text-align: center;"><span style="color: #ed1c24;"><strong>TRUNG TÂM ĐÀO TẠO
                                                & SÁT HẠCH LÁI XE MẠNH LINH</strong></span></h1>
                                    <p><img loading="lazy" class="alignnone size-full wp-image-40"
                                            src="{{ asset('wp-content/uploads/2020/12/bg_content.png') }}" alt=""
                                            width="253" height="22" /><br />

                                        <style>
                                            #text-1863628793 {
                                                text-align: center;
                                            }
                                        </style>
                                </div>
                                @foreach ($gioithieu as $bai)
                                    <div class="row row-small align-middle" id="row-1031561319">
                                        <div id="col-1363285695" class="col medium-6 small-12 large-6"
                                            data-animate="fadeInLeft">
                                            <div class="col-inner">
                                                <div id="text-216414297" class="text">
                                                    {!!Str::words($bai->description,100)  !!}
                                                    <style>
                                                        #text-216414297 {
                                                            text-align: left;
                                                        }
                                                    </style>
                                                </div>
                                                <a data-animate="fadeInLeft" href="" target="_self"
                                                    class="button alert is-shade lowercase">
                                                    <span>Xem chi tiết</span>
                                                    <i class="bi bi-chevron-right"></i></a>
                                            </div>
                                        </div>
                                        <div id="col-1875567096" class="col medium-6 small-12 large-6">
                                            <div class="col-inner">
                                                <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_903339558">
                                                    <div data-animate="fadeInRight">
                                                        <div class="img-inner dark">
                                                            <img width="1020" height="680" src="{{ $bai->image }}"
                                                                class="attachment-large size-large" alt=""
                                                                loading="lazy" sizes="(max-width: 1020px) 100vw, 1020px" />
                                                        </div>
                                                    </div>
                                                    <style>
                                                        #image_903339558 {
                                                            width: 100%;
                                                        }
                                                    </style>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div id="text-1492947643" class="text">
                                    <h2 style="text-align: center;"><span style="color: #ed1c24;"><strong>--THÔNG
                                                BÁO--</strong></span></h2>
                                    <p><img loading="lazy" class="alignnone size-full wp-image-40"
                                            src="{{ asset('wp-content/uploads/2020/12/bg_content.png') }}" alt=""
                                            width="253" height="22" /><br />
                                        <style>
                                            #text-1492947643 {
                                                text-align: center;
                                            }
                                        </style>
                                </div>
                                @foreach ($thongbaos as $thongbao)
                                    <div class="row row-small" id="row-1523900692">
                                        <div id="col-2044222511" class="col medium-4 small-12 large-4"
                                            data-animate="fadeInLeft">
                                            <div class="col-inner text-center">
                                                <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1078633589">
                                                    <div data-animate="fadeInLeft">
                                                        <div class="img-inner image-cover dark" style="padding-top:300px;">
                                                            <img width="2560" height="1707" src="{{ $thongbao->image }}"
                                                                class="attachment-original size-original" alt=""
                                                                loading="lazy"
                                                                sizes="(max-width: 2560px) 100vw, 2560px" />
                                                        </div>
                                                    </div>
                                                    <style>
                                                        #image_1078633589 {
                                                            width: 100%;
                                                        }
                                                    </style>
                                                </div>
                                                <h3>{{ $thongbao->title }}</h3>
                                                <div class="text-center">
                                                    <div class="is-divider divider clearfix"
                                                        style="margin-top:0.3em;margin-bottom:0.3em;max-width:40%;height:1px;background-color:rgb(0, 0, 0);">
                                                    </div>
                                                </div>
                                                <div id="text-2151010940" class="text">
                                                    <p>{!! Str::words($thongbao->description,50) !!}</p>

                                                    <style>
                                                        #text-2151010940 {
                                                            text-align: left;
                                                        }
                                                    </style>
                                                </div>
                                                <a data-animate="fadeInRight" href="" target="_self"
                                                    class="button alert is-shade is-small lowercase">
                                                    <span>Xem chi tiết</span>
                                                </a>
                                            </div>
                                        </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>
        </div>
        <style>
            #section_1734715175 {
                padding-top: 15px;
                padding-bottom: 15px;
                background-color: rgb(255, 255, 255);
            }
        </style>
        </section>
        <section class="section" id="section_539455669">
            <div class="bg section-bg fill bg-fill  ">
                <div class="is-border" style="border-width:1px 0px 1px 0px;">
                </div>
            </div>
            <div class="section-content relative">
                <div class="row align-equal" id="row-506155279">
                    <div id="col-1327100458" class="col medium-4 small-12 large-4">
                        <div class="col-inner">
                            <h2 class="uppercase"><span style="color: #ed1c24;">TIN TỨC &#8211; SỰ KIỆN</span></h2>
                            <p>Nơi cập nhật các tin tức nhanh nhất về các thông tin lớp khai giảng, lịch thi,...</p>
                            <a href="#" target="_self" class="button alert is-outline">
                                <span>Xem Thêm</span>
                                <i class="bi bi-caret-right-fill"></i></a>
                        </div>
                    </div>
                    <div id="col-146559227" class="col medium-8 small-12 large-8">
                        <div class="col-inner">
                            <div class="row large-columns-2 medium-columns- small-columns-1 has-shadow row-box-shadow-1 slider row-slider slider-nav-circle slider-nav-push"
                                data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'>

                                @foreach ($tintucs as $tintuc)
                                    <div class="col post-item">
                                        <div class="col-inner">
                                            <a href="" class="plain">
                                                <div class="box box-default box-text-bottom box-blog-post has-hover">
                                                    <div class="box-image">
                                                        <div class="image-cover" style="padding-top:56%;">
                                                            <img width="1300" height="800"
                                                                src="{{ asset($tintuc->image) }}"
                                                                class="attachment-original size-original wp-post-image"
                                                                sizes="(max-width: 1300px) 100vw, 1300px" />
                                                        </div>
                                                    </div>
                                                    <div class="box-text text-left"
                                                        style="background-color:rgb(255, 255, 255);">
                                                        <div class="box-text-inner blog-post-inner">
                                                            <h5 class="post-title is-large ">{{ $tintuc->title }}</h5>
                                                            <div class="is-divider"></div>
                                                            <p class="from_the_blog_excerpt ">{!! Str::words($tintuc->description,50)!!} [...]
                                                            </p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <style>
                                #section_539455669 {
                                    padding-top: 43px;
                                    padding-bottom: 43px;
                                    min-height: 276px;
                                    background-color: rgb(241, 241, 241);
                                }

                                #section_539455669 .section-bg.bg-loaded {
                                    background-image: url({{ asset('wp-content/uploads/2020/12/bg2.png') }});
                                }
                            </style>
        </section>
        <section class="section" id="section_79768113">
            <div class="bg section-bg fill bg-fill  bg-loaded">
                <div class="section-bg-overlay absolute fill"></div>
                <div class="is-border" style="border-width:1px 0px 1px 0px;">
                </div>
            </div>
            <div class="section-content relative">

                <div id="text-2695813275" class="text">

                    <h2 style="text-align: center;"><span style="color: #ed1c24;"><strong>VIDEO NỔI BẬT VỀ TRUNG
                                TÂM</strong></span></h2>
                    <p><img loading="lazy" class="alignnone size-full wp-image-40"
                            src="{{ asset('wp-content/uploads/2020/12/bg_content.png') }}" alt="" width="253"
                            height="22" /><br />
                        <style>
                            #text-2695813275 {
                                text-align: center;
                            }
                        </style>
                </div>
                <div class="row row-small" id="row-1217809853">
                    @foreach ($videos as $video)
                        <div id="col-1386268335" class="col medium-4 small-12 large-4">
                            <div class="col-inner">
                                <div class="video video-fit mb" style="padding-top:56.25%;">
                                    <p><iframe loading="lazy" width="1020" height="574"
                                            src="https://www.youtube.com/embed/{{ $video->filename }}" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <style>
                #section_79768113 {
                    padding-top: 30px;
                    padding-bottom: 30px;
                    background-color: rgb(193, 193, 193);
                }

                #section_79768113 .section-bg-overlay {
                    background-color: rgba(255, 255, 255, 0.85);
                }
            </style>
        </section>
        <section class="section" id="section_1079026232">
            <div class="bg section-bg fill bg-fill  bg-loaded">
            </div>
            <div class="section-content relative">
                <div id="text-959945200" class="text">
                    <h2 style="text-align: center;"><span style="color: #eadfdf;"><strong>HÌNH ẢNH HOẠT
                                ĐỘNG</strong></span></h2>
                    <p><img loading="lazy" class="alignnone size-full wp-image-40"
                            src="{{ asset('wp-content/uploads/2020/12/bg_content.png') }}" alt="" width="253"
                            height="22" /><br />

                        <style>
                            #text-959945200 {
                                text-align: center;
                            }
                        </style>
                </div>
                <div id="gallery-2031927119"
                    class="row large-columns-4 medium-columns-3 small-columns-2 row-small row-masonry"
                    data-packery-options='{"itemSelector": ".col", "gutter": 0, "presentageWidth" : true}'>
                    @foreach ($anhs as $anh)
                        <div class="gallery-col col">
                            <div class="col-inner">
                                <a class="image-lightbox lightbox-gallery" href="{{ asset($anh->image) }}"
                                    title="">
                                    <div class="box has-hover gallery-box box-none">
                                        <div class="box-image">
                                            <img width="500" height="400" src="{{ asset($anh->image) }}"
                                                class="attachment-medium size-medium" alt="" loading="lazy"
                                                ids="178,179,180,181,182,183,184,185" style="none" type="masonry"
                                                col_spacing="small" sizes="(max-width: 600px) 100vw, 600px" />
                                        </div>
                                        <div class="box-text text-left">
                                            <p></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <style>
                    #section_1079026232 {
                        padding-top: 30px;
                        padding-bottom: 30px;
                    }
                </style>
        </section>
        </div>
    </main>
@endsection
