@extends('frondend.layouts.master')
@section('content')
    <main id="main" class="">
        <div id="content" class="blog-wrapper blog-single page-wrapper">
            <div class="row row-large ">
                <div class="large-9 col">
                    <article id="post-694"
                        class="post-694 post type-post status-publish format-standard has-post-thumbnail hentry category-tin-tuc-su-kien">
                        <div class="article-inner ">
                            <header class="entry-header">
                                <div class="entry-header-text entry-header-text-top text-left">
                                    <h1 class="entry-title">Đăng ký nhập học</h1>
                                </div>
                            </header>
                        </div>
                    </article>
                    <div id="comments" class="comments-area">
                        <div id="respond" class="comment-respond">
                            <h3 id="reply-title" class="comment-reply-title">Vui lòng nhập đầy đủ thông tin  </h3>
                            <form action="#" method="" id="commentform"
                                class="comment-form" novalidate>
                                <p class="comment-notes">
                                    <span class="required-field-message" aria-hidden="true">
                                        <span class="required"
                                            aria-hidden="true">
                                        </span>
                                    </span></p>
                                    <br>
                                <p class="comment-form-comment">
                                    <label for="comment">Họ và tên
                                        <span class="required"aria-hidden="true">*</span>
                                        </label>
                                        <input type="text" name = 'name'>
                                </p>
                                <p class="comment-form-comment">
                                    <label for="comment">Số điện thoại
                                        <span class="required"aria-hidden="true">*</span>
                                        </label>
                                        <input type="text" name = 'name'>
                                </p>
                                <p class="comment-form-author"><label for="author">Hạng <span class="required"
                                            aria-hidden="true">*</span></label>
                                        <select name="" id="">
                                            <option value="">---chọn hạng---</option>
                                            <option value="">Ô tô số tự động hạng B1</option>
                                            <option value="">ô tô số sàn hạng B2</option>
                                            <option value="">Xe máy hạng A1</option>
                                        </select></p>
                                <p class="comment-form-email"><label for="email">Email <span class="required"
                                            aria-hidden="true">*</span></label> <input id="email" name="email"
                                        type="email" value="" size="30" maxlength="100"
                                        aria-describedby="email-notes" required /></p>

                                <p class="comment-form-comment">
                                    <label for="comment">Ghi chú
                                        <span class="required"aria-hidden="true">*</span>
                                        </label>
                                    <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required></textarea>
                                </p>
                                <p class="form-submit"><input name="submit" type="submit" id="submit"
                                        class="submit" value="Đăng ký" /> <input type='hidden' name='comment_post_ID'
                                        value='694' id='comment_post_ID' />
                                    <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                                </p>
                            </form>
                        </div><!-- #respond -->
                    </div>
                </div>
                <div class="post-sidebar large-3 col">
                    <div id="secondary" class="widget-area " role="complementary">
                        <aside id="flatsome_recent_posts-2" class="widget flatsome_recent_posts"> <span
                                class="widget-title "><span>Bài Viết Nổi Bật</span></span>
                            <div class="is-divider small"></div>
                            <ul>
                                <li class="recent-blog-posts-li">
                                    <div class="flex-row recent-blog-posts align-top pt-half pb-half">
                                        <div class="flex-col mr-half">
                                            <div class="badge post-date  badge-outline">
                                                <div class="badge-inner bg-fill"
                                                    style="background: url({{asset('wp-content/uploads/2021/12/mua-dat-quang-tri-9-280x280.jpg')}}); border:0;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-col flex-grow">
                                            <a href="https://quanggroup.vn/dat-nen-quang-tri-ban-gap-dat-dong-ha/"
                                                title="Đất Nền Quảng Trị, Bán Gấp Lô Đất Nền tại Đông Hà">Đất Nền
                                                Quảng Trị, Bán Gấp Lô Đất Nền tại Đông Hà</a>
                                            <span class="post_comments op-7 block is-xsmall"><a
                                                    href="https://quanggroup.vn/dat-nen-quang-tri-ban-gap-dat-dong-ha/#respond"></a></span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
