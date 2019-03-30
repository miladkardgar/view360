@extends('users.layouts.master')
@section('script')
    <script src="{{url('/public/assets/js/magnifig.js')}}" type="text/javascript"></script>
@endsection
@section('body')
    <main id="ts-main">

        <!--BREADCRUMB
            =========================================================================================================-->
        <section id="breadcrumb">
            <div class="container">
                <nav aria-label="breadcrumb">
                    {{--<ol class="breadcrumb">--}}
                    {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                    {{--<li class="breadcrumb-item"><a href="#">Library</a></li>--}}
                    {{--<li class="breadcrumb-item active" aria-current="page">Data</li>--}}
                    {{--</ol>--}}
                </nav>
            </div>
        </section>

        <!--GALLERY CAROUSEL
            =========================================================================================================-->
        <section id="gallery-carousel" class="">

            <div class="owl-carousel ts-gallery-carousel ts-gallery-carousel__multi" data-owl-dots="1"
                 data-owl-items="3" data-owl-center="1" data-owl-loop="1">

                <!--Slide-->
                <div class="slide">
                    <div class="ts-image" data-bg-image="{{url('/public/assets/img/img-detail-01.jpg')}}">
                        <a href="{{url('/public/assets/img/img-detail-01.jpg')}}" class="ts-zoom popup-image"><i
                                    class="fa fa-search-plus"></i>بزرگنمایی</a>
                    </div>
                </div>

                <!--Slide-->
                <div class="slide">
                    <div class="ts-image" data-bg-image="{{url('/public/assets/img/img-detail-02.jpg')}}">
                        <a href="{{url('/public/assets/img/img-detail-02.jpg')}}" class="ts-zoom popup-image"><i
                                    class="fa fa-search-plus"></i>بزرگنمایی</a>
                    </div>
                </div>

                <!--Slide-->
                <div class="slide">
                    <div class="ts-image" data-bg-image="{{url('/public/assets/img/img-detail-05.jpg')}}">
                        <a href="{{url('/public/assets/img/img-detail-03.jpg')}}" class="ts-zoom popup-image"><i
                                    class="fa fa-search-plus"></i>بزرگنمایی</a>
                    </div>
                </div>

                <!--Slide-->
                <div class="slide">
                    <div class="ts-image" data-bg-image="{{url('/public/assets/img/img-detail-04.jpg')}}">
                        <a href="{{url('/public/assets/img/img-detail-04.jpg')}}" class="ts-zoom popup-image"><i
                                    class="fa fa-search-plus"></i>بزرگنمایی</a>
                    </div>
                </div>

                <!--Slide-->
                <div class="slide">
                    <div class="ts-image" data-bg-image="{{url('/public/assets/img/img-detail-03.jpg')}}">
                        <a href="{{url('/public/assets/img/img-detail-05.jpg')}}" class="ts-zoom popup-image"><i
                                    class="fa fa-search-plus"></i>بزرگنمایی</a>
                    </div>
                </div>

            </div>

        </section>

        <!--PAGE TITLE
            =========================================================================================================-->
        <section id="page-title" class="border-bottom ts-white-gradient">
            <div class="container">

                <div class="d-block d-sm-flex justify-content-between">

                    <!--Title-->
                    <div class="ts-title mb-0">
                        <h1>Big Luxury Apartment</h1>
                        <h5 class="ts-opacity__90">
                            <i class="fa fa-map-marker text-primary"></i>
                            1350 Arbutus Drive
                        </h5>
                    </div>

                    <!--Price-->
                    <h3>
                        <span class="badge badge-primary p-3 font-weight-normal ts-shadow__sm">$350,000</span>
                    </h3>

                </div>

            </div>
        </section>

        <!--CONTENT
            =========================================================================================================-->
        <section id="content">
            <div class="container">
                <div class="row flex-wrap-reverse">

                    <!--LEFT SIDE
                        =============================================================================================-->
                    <div class="col-md-5 col-lg-4">

                        <!--DETAILS
                            =========================================================================================-->
                        <section id="location">

                            <h3>موقعیت</h3>

                            <div class="ts-box p-0">
                                <div class="ts-map ts-map__detail" id="ts-map-simple"
                                     data-ts-map-leaflet-provider="https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}{r}.png"
                                     data-ts-map-zoom="12"
                                     data-ts-map-center-latitude="40.702411"
                                     data-ts-map-center-longitude="-73.556842"
                                     data-ts-map-scroll-wheel="1"
                                     data-ts-map-controls="0"></div>
                                <div class="p-3 ts-text-color-light">
                                    <i class="fa fa-map-marker mr-2"></i>
                                    1496 Apple Lane
                                    San Jose, IL 62682
                                </div>
                            </div>

                        </section>

                        <!--CONTACT THE AGENT
                            =========================================================================================-->
                        <section class="contact-the-agent">
                            <h3>ارتباط با نماینده</h3>

                            <div class="ts-box">

                                <!--Agent Image & Phone-->
                                <div class="ts-center__vertical mb-4">

                                    <!--Image-->
                                    <a href="agent-detail-01.html" class="ts-circle p-5 mr-4 ts-shadow__sm"
                                       data-bg-image="{{url('/public/assets/img/img-person-05.jpg')}}"></a>

                                    <!--Phone contact-->
                                    <figure class="mb-0">
                                        <h5 class="mb-0">Jane Brown</h5>
                                        <p class="mb-0">
                                            <i class="fa fa-phone-square ts-opacity__50 mr-2"></i>
                                            +1 602-862-1673
                                        </p>
                                    </figure>
                                </div>

                                <!--Agent contact form-->
                                <form id="form-agent" class="ts-form">

                                    <!--Name-->
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="نام و نام خانوادگی">
                                    </div>

                                    <!--Email-->
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="ایمیل">
                                    </div>

                                    <!--Message-->
                                    <div class="form-group">
                                        <textarea class="form-control" id="form-contact-message" rows="3" name="message"
                                                  placeholder="سلام در مورد فایل شماره {{$id}} نیاز به اطلاعات بیشتر دارم."></textarea>
                                    </div>

                                    <!--Submit button-->
                                    <div class="form-group clearfix mb-0">
                                        <button type="submit" class="btn btn-primary float-right"
                                                id="form-contact-submit">ارسال پیام
                                        </button>
                                    </div>

                                </form>

                            </div>
                        </section>

                        <!--ACTIONS
                        =============================================================================================-->
                        <section id="actions">

                            <div class="d-flex justify-content-between">

                                <a href="#" class="btn btn-light mr-2 w-100" data-toggle="tooltip" data-placement="top"
                                   title="افزودن به علاقه مندی ها">
                                    <i class="far fa-star"></i>
                                </a>

                                <a href="#" class="btn btn-light mr-2 w-100" data-toggle="tooltip" data-placement="top"
                                   title="چاپ">
                                    <i class="fa fa-print"></i>
                                </a>

                                <a href="#" class="btn btn-light mr-2 w-100" data-toggle="tooltip" data-placement="top"
                                   title="افزودن به مقایسه">
                                    <i class="fa fa-exchange-alt"></i>
                                </a>

                                <a href="#" class="btn btn-light w-100" data-toggle="tooltip" data-placement="top"
                                   title="اشتراک گزاری">
                                    <i class="fa fa-share-alt"></i>
                                </a>

                            </div>

                        </section>

                    </div>
                    <!--end col-md-4-->

                    <!--RIGHT SIDE
                        =============================================================================================-->
                    <div class="col-md-7 col-lg-8">

                        <!--DESCRIPTION
                            =========================================================================================-->
                        <section id="description">

                            <h3>توضیحات</h3>

                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In dictum ac augue et suscipit.
                                Vivamus ac tellus ut massa bibendum aliquam vitae ac diam. Aenean in enim volutpat,
                                accumsan erat non, porta massa. Nulla ac porta orci. Quisque condimentum fermentum
                                isl, lacinia tempor erat venenatis non. Integer ut malesuada est, nec pulvinar magna.
                                Vestibulum tincidunt malesuada mi eget mattis. Phasellus quis purus porta, auctor dolor
                                sed, eleifend tortor. Vestibulum placerat tristique turpis, eu suscipit nulla elementum
                                porttitor. Duis eu varius libero.
                            </p>

                            <dl class="ts-description-list__line mb-0 ts-column-count-2">

                                <dt>شماره فایل:</dt>
                                <dd class="border-bottom pb-2">#156461</dd>

                                <dt>دسته بندی:</dt>
                                <dd class="border-bottom pb-2">Apartments</dd>

                                <dt>وضعیت:</dt>
                                <dd class="border-bottom pb-2">Sale</dd>

                                <dt>منطقه:</dt>
                                <dd class="border-bottom pb-2">248<sup>2</sup></dd>

                                <dt>اتاق:</dt>
                                <dd class="border-bottom pb-2">6</dd>

                                <dt>حمام:</dt>
                                <dd class="border-bottom pb-2">2</dd>

                                <dt>خواب:</dt>
                                <dd class="border-bottom pb-2">2</dd>

                                <dt>پارکینگ:</dt>
                                <dd class="border-bottom pb-2">1</dd>

                            </dl>

                        </section>

                        <!--FLOOR PLANS
                            =========================================================================================-->
                        <section id="floor-plans">

                            <h3>نقشه طبقات</h3>

                            <!--1st Floor-->
                            <a href="#collapse-floor-1" class="ts-box d-block mb-2 py-3" data-toggle="collapse"
                               role="button" aria-expanded="true" aria-controls="collapse-floor-1">
                                طبقه اول
                                <div class="collapse show" id="collapse-floor-1">
                                    <img src="{{url('/public/assets/img/img-floor-plan-01.jpg')}}" alt="" class="w-100">
                                </div>
                            </a>

                            <!--2nd Floor-->
                            <a href="#collapse-floor-2" class="ts-box d-block py-3" data-toggle="collapse" role="button"
                               aria-expanded="false" aria-controls="collapse-floor-2">
                                طبقه دوم
                                <div class="collapse" id="collapse-floor-2">
                                    <img src="{{url('/public/assets/img/img-floor-plan-02.jpg')}}" alt="" class="w-100">
                                </div>
                            </a>

                        </section>

                        <!--FEATURES
                            =========================================================================================-->
                        <section id="features">

                            <h3>ویژگی ها</h3>

                            <ul class="list-unstyled ts-list-icons ts-column-count-4 ts-column-count-sm-2 ts-column-count-md-2">
                                <li>
                                    <i class="fa fa-bell"></i>
                                    آیفون تصویری
                                </li>
                                <li>
                                    <i class="fa fa-wifi"></i>
                                    وای فای
                                </li>
                                <li>
                                    <i class="fa fa-utensils"></i>
                                    نزدیک رستوران
                                </li>
                                <li>
                                    <i class="fa fa-plug"></i>
                                    230V Plugs
                                </li>
                                <li>
                                    <i class="fa fa-wheelchair"></i>
                                    دسترسی سریع
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    تلفن
                                </li>
                                <li>
                                    <i class="fa fa-train"></i>
                                    ایستگاه مترو
                                </li>
                                <li>
                                    <i class="fa fa-key"></i>
                                    کلید امن
                                </li>
                            </ul>

                        </section>

                        <!--VIDEO
                        =============================================================================================-->

                        <section id="video">

                            <h3>ویدئو</h3>

                            <div class="embed-responsive embed-responsive-16by9 rounded ts-shadow__md">
                                <iframe src="https://player.vimeo.com/video/9799783?color=ffffff&title=0&byline=0&portrait=0"
                                        width="640" height="360" frameborder="0" webkitallowfullscreen
                                        mozallowfullscreen allowfullscreen></iframe>
                            </div>

                        </section>

                        <!--AMENITIES
                            =========================================================================================-->
                        <section id="amenities">

                            <h3>امکانات</h3>

                            <ul class="ts-list-colored-bullets ts-text-color-light ts-column-count-3 ts-column-count-md-2">
                                <li>تهویه مطبوع</li>
                                <li>استخر شما</li>
                                <li>گرمایش مرکزی</li>
                                <li>اتاق لباس شویی</li>
                                <li>باشگاه</li>
                                <li>اطلاعات</li>
                                <li>اینترنت</li>
                            </ul>

                        </section>

                    </div>
                    <!--end col-md-8-->

                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>

        <!--SIMILAR PROPERTIES
        =============================================================================================================-->
        <section id="similar-properties">
            <div class="container">
                <div class="row">

                    <div class="offset-lg-4 col-sm-12 col-lg-8">

                        <hr class="mb-5">

                        <h3>فایل های مشابه</h3>

                        <!--Item-->
                        <div class="card ts-item ts-item__list ts-card">

                            <!--Ribbon-->
                            <div class="ts-ribbon">
                                <i class="fa fa-thumbs-up"></i>
                            </div>

                            <!--Card Image-->
                            <a href="detail-01.html" class="card-img"
                               data-bg-image="{{url('/public/assets/img/img-item-thumb-01.jpg')}}"></a>

                            <!--Card Body-->
                            <div class="card-body">

                                <figure class="ts-item__info">
                                    <h4>Big Luxury Apartment</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        1350 Arbutus Drive
                                    </aside>
                                </figure>

                                <div class="ts-item__info-badge">
                                    $350,000
                                </div>

                                <div class="ts-description-lists">
                                    <dl>
                                        <dt>Area</dt>
                                        <dd>325m<sup>2</sup></dd>
                                    </dl>
                                    <dl>
                                        <dt>Bedrooms</dt>
                                        <dd>2</dd>
                                    </dl>
                                    <dl>
                                        <dt>Bathrooms</dt>
                                        <dd>1</dd>
                                    </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="detail-01.html" class="card-footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>

                        <!--Item-->
                        <div class="card ts-item ts-item__list ts-card">

                            <!--Ribbon-->
                            <div class="ts-ribbon-corner">
                                <span>Updated</span>
                            </div>

                            <!--Card Image-->
                            <a href="detail-01.html" class="card-img ts-item__image"
                               data-bg-image="{{url('/public/assets/img/img-item-thumb-02.jpg')}}"></a>

                            <!--Card Body-->
                            <div class="card-body ts-item__body">

                                <figure class="ts-item__info">
                                    <h4>Cozy Design Studio</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        4831 Worthington Drive
                                    </aside>
                                </figure>

                                <div class="ts-item__info-badge">$125,000</div>

                                <div class="ts-description-lists">
                                    <dl>
                                        <dt>Area</dt>
                                        <dd>325m<sup>2</sup></dd>
                                    </dl>
                                    <dl>
                                        <dt>Bedrooms</dt>
                                        <dd>2</dd>
                                    </dl>
                                    <dl>
                                        <dt>Bathrooms</dt>
                                        <dd>1</dd>
                                    </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="detail-01.html" class="card-footer ts-item__footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>

                        <!--Item-->
                        <div class="card ts-item ts-item__list ts-card">

                            <!--Card Image-->
                            <a href="detail-01.html" class="card-img ts-item__image"
                               data-bg-image="{{url('/public/assets/img/img-item-thumb-03.jpg')}}"></a>

                            <!--Card Body-->
                            <div class="card-body ts-item__body">

                                <figure class="ts-item__info">
                                    <h4>Family Villa</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        4127 Winding Way
                                    </aside>
                                </figure>

                                <div class="ts-item__info-badge">$45,900</div>

                                <div class="ts-description-lists">
                                    <dl>
                                        <dt>Area</dt>
                                        <dd>325m<sup>2</sup></dd>
                                    </dl>
                                    <dl>
                                        <dt>Bedrooms</dt>
                                        <dd>2</dd>
                                    </dl>
                                    <dl>
                                        <dt>Bathrooms</dt>
                                        <dd>1</dd>
                                    </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="detail-01.html" class="card-footer ts-item__footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>

                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection