@php
    $site_settings = app('site_settings');
@endphp

<footer id="ts-footer">
    <section id="ts-footer-main">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="#" class="brand">
                        <img src="{{url('/public/assets/img.png')}}" width="80" alt="">
                    </a>
                    <p class="mb-4">
                        {{$site_settings->site_description}}
                    </p>
                    <a href="contact" class="btn btn-outline-dark mb-4">ارتباط با ما</a>
                </div>

                <div class="col-md-2">
                    <h4>منو دسترسی</h4>
                    <nav class="nav flex-row flex-md-column mb-4">
                        <a href="/" class="nav-link">صفحه اصلی</a>
                        <a href="about" class="nav-link">درباره ما</a>
                        <a href="contact" class="nav-link">تماس با ما</a>
                        <a href="login" class="nav-link">ورود</a>
                        <a href="register" class="nav-link">ثبت نام</a>
                        {{--                        <a href="#" class="nav-link">ارسال فایل</a>--}}
                    </nav>
                </div>

                <div class="col-md-4">
                    <h4>تماس با ما</h4>
                    <address class="ts-text-color-light">

                        {{isset($site_settings->site_address)?$site_settings->site_address:''}}
                        <br>
                        {{isset($site_settings->site_address2)?$site_settings->site_address2:''}}
                        <br>
                        @if(isset($site_settings->site_email))
                            <strong>پست الکترونیکی: </strong>
                            <a href="#" class="btn-link">{{$site_settings->site_email}}</a>
                            <br>
                        @endif
                        @if(isset($site_settings->site_tel))
                            <strong>تلفن:</strong>{{$site_settings->site_tel}}<br>
                        @endif
                        @if(isset($site_settings->site_fax))
                            <strong>فاکس: </strong>{{$site_settings->site_fax}}
                        @endif

                    </address>
                </div>

            </div>
        </div>
    </section>
    <section id="ts-footer-secondary">
        <div class="container">
            <div class="ts-copyright">تمامی حقوق سایت محفوظ است.</div>
            <div class="ts-footer-nav">
                <nav class="nav">
                    @if(isset($site_settings->site_facebook))
                        <a href="{{$site_settings->site_facebook}}" class="nav-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    @endif
                    @if(isset($site_settings->site_twitter))
                        <a href="{{$site_settings->site_twitter}}" class="nav-link">
                            <i class="fab fa-twitter"></i>
                        </a>
                    @endif
                    @if(isset($site_settings->site_telegram))
                        <a href="{{$site_settings->site_telegram}}" class="nav-link">
                            <i class="fab fa-telegram"></i>
                        </a>
                    @endif
                    @if(isset($site_settings->site_instagram))
                        <a href="{{$site_settings->site_instagram}}" class="nav-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                    @endif
                </nav>
            </div>
        </div>
    </section>
</footer>
