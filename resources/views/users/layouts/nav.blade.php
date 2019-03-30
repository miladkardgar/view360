@php
    $site_settings = app('site_settings');
@endphp
<header id="ts-header" class="fixed-top rtl">
    <nav id="ts-secondary-navigation" class="navbar p-0 rtl">
        <div class="container justify-content-end justify-content-sm-between">
            <div class="navbar-nav d-none d-sm-block rtl">
                <span class="mr-4"><i class="fa fa-phone-square mr-1"></i>{{$site_settings->tel}}</span>
                <a href="#"><i class="fa fa-envelope mr-1"></i>{{$site_settings->email}}</a>
            </div>

            <!--Right Side-->
            <div class="navbar-nav flex-row rtl">
                <input type="text" class="form-control p-2 border-left bg-transparent w-auto" placeholder="جست و جو">
            </div>
            <!--end navbar-nav-->
        </div>
        <!--end container-->
    </nav>

    <!--PRIMARY NAVIGATION
    =============================================================================================================-->
    <nav id="ts-primary-navigation" class="navbar navbar-expand-md navbar-left rtl">
        <div class="container rtl">

            <!--Brand Logo-->
            <a class="navbar-brand" href="index-map-leaflet-fullscreen.html">
                <img src="{{url('/public/assets/img/logo.png')}}" alt="">
            </a>

            <!--Responsive Collapse Button-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPrimary" aria-controls="navbarPrimary" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!--Collapsing Navigation-->
            <div class="collapse navbar-collapse" id="navbarPrimary">

                <!--LEFT NAVIGATION MAIN LEVEL
                =================================================================================================-->
                <ul class="navbar-nav rtl">

                    <li class="nav-item">
                        <a class="nav-link" href="/">صفحه اصلی</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about">درباره ما</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mr-2" href="contact">تماس با ما</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login">ورود</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark" href="register">ثبت نام</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary btn-sm m-1 px-3" href="submit">
                            <i class="fa fa-plus small mr-2"></i>
                            افزودن فایل
                        </a>
                    </li>

                </ul>
                <!--end Right navigation-->

            </div>
            <!--end navbar-collapse-->
        </div>
        <!--end container-->
    </nav>
    <!--end #ts-primary-navigation.navbar-->

</header>