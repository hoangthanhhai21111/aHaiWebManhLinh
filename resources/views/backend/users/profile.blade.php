@extends('backend.master')
@section('content')
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <a href="{{-- {{ route('dashboard') }} --}}">
                            <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>
                            Trang Chủ
                        </a>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row column1">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="white_shd full margin_bottom_30">
                        <div class="full graph_head">
                            <div class="heading1 margin_0">
                                <h2>Thông Tin cá nhân</h2>
                            </div>
                        </div>
                        <div class="full price_table padding_infor_info">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="full dis_flex center_text">
                                        <div class="profile_img"><img width="100" class=""
                                                src="{{ asset(auth()->user()->avatar ?? '') }}" alt="#" /></div>
                                        <div class="profile_contant">
                                            <div class="full inner_elements margin_top_30">
                                                <div class="tab_style2">
                                                    <div class="tabbar">
                                                        <nav>
                                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                                <a class="nav-item nav-link active" id="nav-home-tab"
                                                                    data-toggle="tab" href="#recent_activity" role="tab"
                                                                    aria-selected="true">Thông tin cơ bản</a>
                                                                <a class="nav-item nav-link" id="nav-profile-tab"
                                                                    data-toggle="tab" href="#project_worked" role="tab"
                                                                    aria-selected="false">Thay đổi mật khẩu</a>
                                                            </div>
                                                        </nav>
                                                        <div class="tab-content" id="nav-tabContent">
                                                            <div class="tab-pane fade show active" id="recent_activity"
                                                                role="tabpanel" aria-labelledby="nav-home-tab">
                                                                <div class="msg_list_main">
                                                                    @if (Session::has('success'))
                                                                        <p class="text-success">
                                                                        <div class="alert alert-success"> <i
                                                                                class="fa fa-check" aria-hidden="true"></i>
                                                                            {{ Session::get('success') }}</div>
                                                                        </p>
                                                                    @endif
                                                                    @if (Session::has('error'))
                                                                        <p class="text-danger">
                                                                        <div class="alert alert-danger"> <i
                                                                                class="bi bi-x-circle"aria-hidden="true"></i>
                                                                            {{ Session::get('error') }}</div>
                                                                        </p>
                                                                    @endif
                                                                    <ul class="msg_list">
                                                                        <table>
                                                                            <tr>
                                                                                <th>
                                                                                    Tên:
                                                                                </th>
                                                                                <td>
                                                                                    <span
                                                                                        class="msg_user">{{ auth()->user()->name }}</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    Email:
                                                                                </th>
                                                                                <td>
                                                                                    <span
                                                                                        class="msg_user">{{ auth()->user()->email }}</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    Chức vụ:
                                                                                </th>
                                                                                <td>
                                                                                    <span
                                                                                        class="msg_user">{{ auth()->user()->Group->name }}</span>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="project_worked" role="tabpanel"
                                                                aria-labelledby="nav-profile-tab">
                                                                <div class="msg_list_main">
                                                                    <form
                                                                        action="
                                                                {{-- {{ route('users.editPassword',auth()->user()->id) }} --}}
                                                                "
                                                                        method="post">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <ul class="msg_list">
                                                                            <table>
                                                                                <tr>
                                                                                    <th>
                                                                                        Mật khẩu hiện tại:
                                                                                    </th>
                                                                                    <td>
                                                                                        <span class="msg_user">
                                                                                            <input
                                                                                                type="password"class="form-control"name="password">
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>
                                                                                        Nhập MK mới:
                                                                                    </th>
                                                                                    <td>
                                                                                        <span class="msg_user"><input
                                                                                                type="password"
                                                                                                class="form-control"
                                                                                                name="password1"></span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>
                                                                                        Nhập lại MK mới:
                                                                                    </th>
                                                                                    <td>
                                                                                        <span class=" msg_user"> <input
                                                                                                type="password"
                                                                                                class="form-control"
                                                                                                name="password2"></span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td>
                                                                                        <input type="submit"
                                                                                            class="btn btn-primary">
                                                                                    </td>
                                                                                </tr>

                                                                            </table>
                                                                        </ul>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- footer -->
                            {{-- <div class="container-fluid">
                                <div class="footer">
                                    <p>Bản quyền © 2018 Được thiết kế bởi html.design. Đã đăng ký Bản quyền.<br><br>
                                        Phân phối bởi: <a href="https://themewagon.com/">ThemeWagon</a>
                                    </p>
                                </div>
                            </div> --}}
                </div>
                <!-- end dashboard inner -->
            </div>
        @endsection
