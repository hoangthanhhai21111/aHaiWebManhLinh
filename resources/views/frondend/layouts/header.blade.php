
<header id="header" class="header has-sticky sticky-jump" style = 'background-color:red '>
    <div class="header-wrapper">
        <div id="top-bar" class="header-top hide-for-sticky nav-dark">
            <div class="flex-row container">
                <div class="flex-col hide-for-medium flex-left">
                    <ul class="nav nav-left medium-nav-center nav-small  nav-divided">
                    </ul>
                </div>
                <div class="flex-col hide-for-medium flex-center">
                    <ul class="nav nav-center nav-small  nav-divided">
                    </ul>
                </div>
                <div class="flex-col hide-for-medium flex-right">
                    <ul class="nav top-bar-nav nav-right nav-small  nav-divided">
                        <li class="header-contact-wrapper">
                            <ul id="header-contact" class="nav nav-divided nav-uppercase header-contact">
                                <li class="">
                                    <a target="_blank" rel="noopener noreferrer"
                                        href="https://maps.google.com/?q=04 Lê Thế Hiếu, Phường 1, Đông Hà, Quảng Trị"
                                        title="04 Lê Thế Hiếu, Phường 1, Đông Hà, Quảng Trị" class="tooltip">
                                        <i class="bi bi-pin-map-fill" style="font-size:16px;"></i> <span>
                                            04 Lê Thế Hiếu, Phường 1, Đông Hà, Quảng Trị </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="mailto:bdsquanggroup@gmail.com" class="tooltip"
                                        title="SHManhLinh@gmail.com">
                                        <i class="bi bi-envelope" style="font-size:16px;"></i> <span>
                                            SHManhLinh@gmail.com </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="tooltip" title="08:00 - 17:00 ">
                                        <i class="bi bi-clock" style="font-size:16px;"></i> <span>07:00 - 17:00</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="tel:𝟎𝟑𝟑𝟐.𝟒𝟗𝟖.𝟎𝟕𝟐" class="tooltip" title="𝟎𝟑𝟑𝟐.𝟒𝟗𝟖.𝟎𝟕𝟐">
                                        <i class="bi bi-telephone-fill" style="font-size:16px;"></i> <span>𝟎𝟑𝟑𝟐.𝟒𝟗𝟖.𝟎𝟕𝟐</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="flex-col show-for-medium flex-grow">
                    <ul class="nav nav-center nav-small mobile-nav  nav-divided">
                        <li class="html custom html_topbar_left">TRUNG TÂM ĐÀO TẠO & SÁT HẠCH LÁI XE MẠNH LINH</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="masthead" class="header-main ">
            <div class="header-inner flex-row container logo-left medium-logo-center" role="navigation">
                <!-- Logo -->
                <div id="logo" class="flex-col logo">
                    <!-- Header logo -->
                    <a href="#" title="Mạnh Linh - Trung tâm đào tạo & sát hạch lái xe" rel="home">
                        <img width="185" height="87" src="{{ asset('themeAdmin/images/logo/logo.png') }}"
                            class="header_logo header-logo" alt="Mạnh Linh" /><img width="185" height="87"
                            class="header-logo-dark" alt="Mạnh Linh" /></a>
                </div>
                <!-- Mobile Left Elements -->
                <div class="flex-col show-for-medium flex-left">
                    <ul class="mobile-nav nav nav-left ">
                        <li class="nav-icon has-icon">
                            <a href="#" data-open="#main-menu" data-pos="left" data-bg="main-menu-overlay"
                                data-color="" class="is-small" aria-label="Menu" aria-controls="main-menu"
                                aria-expanded="false">

                                <i class="bi bi-menu-button-wide-fill"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Left Elements -->
                <div class="flex-col hide-for-medium flex-left
            flex-grow">
                    <ul
                        class="header-nav header-nav-main nav nav-left  nav-divided nav-size-large nav-spacing-xlarge nav-uppercase">
                    </ul>
                </div>
                <!-- Right Elements -->
                <div class="flex-col hide-for-medium flex-right">
                    <ul
                        class="header-nav header-nav-main nav nav-right  nav-divided nav-size-large nav-spacing-xlarge nav-uppercase">
                        <li id="menu-item-461"
                            class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-has-children menu-item-461 active menu-item-design-default has-dropdown">
                            <a href="{{ route('home.index') }}" style="color:{{ (url()->current()==route('home.index'))?'red':'black' }}" aria-current="page" class="nav-top-link">TRANG CHỦ</a>

                        </li>
                        <li id="menu-item-951"
                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-951 menu-item-design-default has-dropdown">
                            <a href="#" class="nav-top-link">GIỚI THIỆU</a>

                        </li>
                        <li id="menu-item-952"
                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-952 menu-item-design-default has-dropdown">
                            <a href="{{ route('home.index') }}" class="nav-top-link">THÔNG BÁO</a>

                        </li>
                        <li id="menu-item-450"
                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-450 menu-item-design-default has-dropdown">
                            <a href="{{ route('home.su_kien') }}"style="color:{{ (url()->current()==route('home.su_kien'))?'red':'black' }}"  class="nav-top-link ">SỰ KIỆN</a>

                        </li>
                        <li id="menu-item-148"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-148 menu-item-design-default has-dropdown">
                            <a href="#" class="nav-top-link">ĐĂNG KÝ</a>
                        </li>
                    </ul>
                </div>
                <!-- Mobile Right Elements -->
                <div class="flex-col show-for-medium flex-right">
                    <ul class="mobile-nav nav nav-right ">
                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="top-divider full-width"></div>
            </div>
        </div>
        <div class="header-bg-container fill">
            <div class="header-bg-image fill"></div>
            <div class="header-bg-color fill"></div>
        </div>
    </div>
</header>
