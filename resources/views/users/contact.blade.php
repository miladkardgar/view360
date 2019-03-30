@extends('users.layouts.master')
@section('body')
    <main id="ts-main" class="rtl">

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

        <!--PAGE TITLE
            =========================================================================================================-->
        <section id="page-title">
            <div class="container">
                <div class="ts-title">
                    <h1>تماس با ما</h1>
                </div>
            </div>
        </section>

        <!--MAP
            =========================================================================================================-->
        <section id="map-address">

            <div class="container mb-5">
                <div class="ts-contact-map ts-map ts-shadow__sm position-relative">

                    <!--Address on map-->
                    <address class="position-absolute ts-bottom__0 ts-left__0 text-white m-3 p-4 ts-z-index__2"
                             data-bg-color="rgba(0,0,0,.8)">
                        <strong>{{$contact->site_title}}</strong>
                        <br>
                        {{$contact->site_address}}
                        <br>
                        {{$contact->site_address2}}
                    </address>


                    <!--Map-->
                    <div id="ts-map-simple" class="h-100 ts-z-index__1"
                         data-ts-map-leaflet-provider="https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}{r}.png"
                         data-ts-map-zoom="14"
                         data-ts-map-center-latitude="{{$contact->site_lat}}"
                         data-ts-map-center-longitude="{{$contact->site_lon}}"
                         data-ts-map-scroll-wheel="1"
                         data-ts-map-controls="0"></div>
                </div>
            </div>

        </section>

        <!--CONTACT INFO & FORM
            =========================================================================================================-->
        <section id="contact-form">
            <div class="container">
                <div class="row">

                    <!--CONTACTS (LEFT SIDE)
                        =============================================================================================-->
                    <div class="col-md-4">

                        <!--Title-->
                        <h3>{{$contact->site_title}}</h3>

                        <p>
                            {{$contact->site_description}}
                        </p>

                        @if(isset($contact->site_tel) && $contact->site_tel!="")
                        <figure class="ts-center__vertical">
                            <i class="fa fa-phone ts-opacity__50 mr-3 mb-0 h4 font-weight-bold"></i>
                            <dl class="mb-0">
                                <dt>تلفن</dt>
                                <dd class="ts-opacity__50">{{$contact->site_tel}}</dd>
                            </dl>
                        </figure>
                        @endif

                        @if(isset($contact->site_email) && $contact->site_email!="")
                        <figure class="ts-center__vertical">
                            <i class="fa fa-envelope ts-opacity__50 mr-3 mb-0 h4 font-weight-bold"></i>
                            <dl class="mb-0">
                                <dt>پست الکترونیکی</dt>
                                <dd class="ts-opacity__50">
                                    <a href="#">{{$contact->site_email}}</a>
                                </dd>
                            </dl>
                        </figure>
                        @endif

                        @if(isset($contact->site_fax) && $contact->site_fax!="")
                            <figure class="ts-center__vertical">
                                <i class="fab fa-skype ts-opacity__50 mr-3 mb-0 h4 font-weight-bold"></i>
                                <dl class="mb-0">
                                    <dt>فاکس</dt>
                                    <dd class="ts-opacity__50">
                                        <a href="#">{{$contact->site_fax}}</a>
                                    </dd>
                                </dl>
                            </figure>
                        @endif
                    </div>
                    <!--end col-md-4-->

                    <!--FORM (RIGHT SIDE)
                        =============================================================================================-->
                    <div class="col-md-8">

                        <!--Title-->
                        <h3>ارتباط با ما</h3>

                        <!--Form-->
                        <form id="form-contact" method="post" class="clearfix ts-form ts-form-email"
                              data-php-path="assets/php/email.php">

                            <!--Row-->
                            <div class="row">

                                <!--Name-->
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="form-contact-name">نام و نام خانوادگی *</label>
                                        <input type="text" class="form-control" id="form-contact-name" name="name"
                                               placeholder="نام و نام خانوادگی" required>
                                    </div>
                                </div>

                                <!--Email-->
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="form-contact-email">پست الکترونیکی *</label>
                                        <input type="email" class="form-control" id="form-contact-email" name="email"
                                               placeholder="پست الکترونیکی" required>
                                    </div>
                                </div>

                            </div>
                            <!--end row -->

                            <!--Subject-->
                            <div class="form-group">
                                <label for="form-contact-email">موضوع *</label>
                                <input type="text" class="form-control" id="form-contact-subject" name="subject"
                                       placeholder="موضوع" required>
                            </div>

                            <!--Message-->
                            <div class="form-group">
                                <label for="form-contact-message">پیام *</label>
                                <textarea class="form-control" id="form-contact-message" rows="5" name="message"
                                          placeholder="متن پیام" required></textarea>
                            </div>

                            <!--Submit button-->
                            <div class="form-group clearfix">
                                <button type="submit" class="btn btn-primary float-left" id="form-contact-submit">ارسال پیام
                                </button>
                            </div>

                            <div class="form-contact-status"></div>

                        </form>
                        <!--end form-contact -->
                    </div>
                    <!--end col-md-8-->

                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>

    </main>
@endsection