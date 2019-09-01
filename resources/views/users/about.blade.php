@extends('users.layouts.master')
@section('title','درباره ما')
@section('body')
    <section class="pt-5 pb-0 h-100">
    <main id="ts-hero" class="rtl">
        <div class="ts-full-screen ts-has-horizontal-results w-1001 h-100 d-flex1 flex-column1">
            <section id="page-title" class="pt-4 pb-0">
                <div class="container">
                    <div class="ts-title">
                        <h1>درباره ما</h1>
                    </div>
                </div>
            </section>
            @if($datas->textStatus==1)
                <section id="about-us-description">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div>{!! html_entity_decode($datas->text) !!}</div>
                                <a href="contact" class="btn btn-primary">تماس با ما</a>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            {{--        @if($datas->managerStatus==1)--}}
            {{--            <section id="about-us-team">--}}
            {{--                <div class="container pb-5">--}}
            {{--                    <div class="row">--}}
            {{--                        <div class="col-md-3">--}}
            {{--                            <div class="card ts-person ts-card">--}}
            {{--                                <div class="ts-ribbon">--}}
            {{--                                    <i class="fa fa-thumbs-up"></i>--}}
            {{--                                </div>--}}
            {{--                                <a href="#" class="card-img"--}}
            {{--                                   data-bg-image="{{url('/public/assets/img/img-person-01.jpg')}}">--}}
            {{--                                    <div class="ts-item__info-badge">--}}
            {{--                                        <span>23 Properties</span>--}}
            {{--                                    </div>--}}
            {{--                                </a>--}}
            {{--                                <div class="card-body">--}}
            {{--                                    <figure class="ts-item__info">--}}
            {{--                                        <h4>Jane Harwood</h4>--}}
            {{--                                        <aside>--}}
            {{--                                            <i class="fa fa-map-marker mr-2"></i>--}}
            {{--                                            London--}}
            {{--                                        </aside>--}}
            {{--                                    </figure>--}}
            {{--                                    <dl>--}}
            {{--                                        <dt>Phone</dt>--}}
            {{--                                        <dd>+1 602-862-1673</dd>--}}
            {{--                                        <dt>Email</dt>--}}
            {{--                                        <dd><a href="#">jane.harwood@example.com</a></dd>--}}
            {{--                                    </dl>--}}
            {{--                                </div>--}}
            {{--                                <a href="agent-detail-01.html" class="card-footer">--}}
            {{--                                    <span class="ts-btn-arrow">Detail</span>--}}
            {{--                                </a>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-md-3">--}}
            {{--                            <div class="card ts-person ts-card">--}}
            {{--                                <div class="ts-ribbon">--}}
            {{--                                    <i class="fa fa-thumbs-up"></i>--}}
            {{--                                </div>--}}
            {{--                                <a href="#" class="card-img"--}}
            {{--                                   data-bg-image="{{url('/public/assets/img/img-person-02.jpg')}}">--}}
            {{--                                    <div class="ts-item__info-badge">--}}
            {{--                                        <span>41 Properties</span>--}}
            {{--                                    </div>--}}
            {{--                                </a>--}}
            {{--                                <div class="card-body">--}}
            {{--                                    <figure class="ts-item__info">--}}
            {{--                                        <h4>Jackie Kinsey</h4>--}}
            {{--                                        <aside>--}}
            {{--                                            <i class="fa fa-map-marker mr-2"></i>--}}
            {{--                                            New York--}}
            {{--                                        </aside>--}}
            {{--                                    </figure>--}}
            {{--                                    <dl>--}}
            {{--                                        <dt>Phone</dt>--}}
            {{--                                        <dd>+1 602-862-1673</dd>--}}
            {{--                                        <dt>Email</dt>--}}
            {{--                                        <dd><a href="#">jane.harwood@example.com</a></dd>--}}
            {{--                                    </dl>--}}
            {{--                                </div>--}}
            {{--                                <a href="agent-detail-01.html" class="card-footer">--}}
            {{--                                    <span class="ts-btn-arrow">Detail</span>--}}
            {{--                                </a>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-md-3">--}}
            {{--                            <div class="card ts-person ts-card">--}}
            {{--                                <a href="#" class="card-img"--}}
            {{--                                   data-bg-image="{{url('/public/assets/img/img-person-03.jpg')}}">--}}
            {{--                                    <div class="ts-item__info-badge">--}}
            {{--                                        <span>16 Properties</span>--}}
            {{--                                    </div>--}}
            {{--                                </a>--}}

            {{--                                <!--Body-->--}}
            {{--                                <div class="card-body">--}}

            {{--                                    <figure class="ts-item__info">--}}
            {{--                                        <h4>Adam Price</h4>--}}
            {{--                                        <aside>--}}
            {{--                                            <i class="fa fa-map-marker mr-2"></i>--}}
            {{--                                            Paris--}}
            {{--                                        </aside>--}}
            {{--                                    </figure>--}}

            {{--                                    <dl>--}}
            {{--                                        <dt>Phone</dt>--}}
            {{--                                        <dd>+1 602-862-1673</dd>--}}
            {{--                                        <dt>Email</dt>--}}
            {{--                                        <dd><a href="#">jane.harwood@example.com</a></dd>--}}
            {{--                                    </dl>--}}

            {{--                                </div>--}}

            {{--                                <!--Footer-->--}}
            {{--                                <a href="agent-detail-01.html" class="card-footer">--}}
            {{--                                    <span class="ts-btn-arrow">Detail</span>--}}
            {{--                                </a>--}}

            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-md-3">--}}
            {{--                            <div class="card ts-person ts-card">--}}
            {{--                                <a href="#" class="card-img"--}}
            {{--                                   data-bg-image="{{url('public/assets/img/img-person-04.jpg')}}">--}}
            {{--                                    <div class="ts-item__info-badge">--}}
            {{--                                        <span>28 Properties</span>--}}
            {{--                                    </div>--}}
            {{--                                </a>--}}

            {{--                                <!--Body-->--}}
            {{--                                <div class="card-body">--}}

            {{--                                    <figure class="ts-item__info">--}}
            {{--                                        <h4>Edward Palmer</h4>--}}
            {{--                                        <aside>--}}
            {{--                                            <i class="fa fa-map-marker mr-2"></i>--}}
            {{--                                            Berlin--}}
            {{--                                        </aside>--}}
            {{--                                    </figure>--}}

            {{--                                    <dl>--}}
            {{--                                        <dt>Phone</dt>--}}
            {{--                                        <dd>+1 602-862-1673</dd>--}}
            {{--                                        <dt>Email</dt>--}}
            {{--                                        <dd><a href="#">jane.harwood@example.com</a></dd>--}}
            {{--                                    </dl>--}}

            {{--                                </div>--}}

            {{--                                <!--Footer-->--}}
            {{--                                <a href="agent-detail-01.html" class="card-footer">--}}
            {{--                                    <span class="ts-btn-arrow">Detail</span>--}}
            {{--                                </a>--}}

            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </section>--}}
            {{--        @endif--}}
            {{--        @if($datas->noticeStatus==1)--}}
            {{--            <section id="about-us-testimonials-carousel">--}}
            {{--                <div class="bg-white text-center py-5">--}}
            {{--                    <div class="container">--}}
            {{--                        <div class="offset-lg-2 col-lg-8">--}}
            {{--                            <div class="owl-carousel" data-owl-items="1" data-owl-dots="1" data-owl-rtl="true">--}}

            {{--                                <div class="ts-slide">--}}
            {{--                                    <div class="ts-circle__sm"--}}
            {{--                                         data-bg-image="{{url('/public/assets/img/img-person-01.jpg')}}"></div>--}}
            {{--                                    <h5 class="my-3">Jane Doe</h5>--}}
            {{--                                    <p class="h5 font-weight-normal ts-text-color-light">--}}
            {{--                                        Duis ac dolor et enim volutpat semper. Morbi placerat tempor ornare. Quisque--}}
            {{--                                        bibendum--}}
            {{--                                        ultrices diam, ac fermentum massa egestas quis.--}}
            {{--                                    </p>--}}
            {{--                                </div>--}}
            {{--                                <!--end ts-slide-->--}}

            {{--                                <div class="ts-slide">--}}
            {{--                                    <div class="ts-circle__sm"--}}
            {{--                                         data-bg-image="{{url('/public/assets/img/img-person-02.jpg')}}"></div>--}}
            {{--                                    <h5 class="my-3">Catherine Pride</h5>--}}
            {{--                                    <p class="h5 font-weight-normal ts-text-color-light">--}}
            {{--                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec placerat tempor--}}
            {{--                                        sapien.--}}
            {{--                                        In lobortis posuere tincidunt. Curabitur malesuada tempus ligula nec--}}
            {{--                                    </p>--}}
            {{--                                </div>--}}
            {{--                                <!--end ts-slide-->--}}

            {{--                            </div>--}}
            {{--                            <!--end owl-carousel-->--}}
            {{--                        </div>--}}
            {{--                        <!--end offset-lg-2-->--}}
            {{--                    </div>--}}
            {{--                    <!--end container-->--}}
            {{--                </div>--}}
            {{--                <!--end ts-block-->--}}
            {{--            </section>--}}
            {{--        @endif--}}
            {{--        @if($datas->counterStatus==1)--}}
            {{--            <section id="about-us-numbers">--}}
            {{--                <div id="numbers" class="py-5 text-white text-center ts-separate-bg-element" data-bg-color="#000037"--}}
            {{--                     data-bg-image="{{url('/public/assets/img/bg-apartment-table.jpg')}}" data-bg-image-opacity=".3">--}}
            {{--                    <div class="container py-5">--}}
            {{--                        <div class="ts-promo-numbers">--}}
            {{--                            <div class="row">--}}

            {{--                                <div class="col-sm-3">--}}
            {{--                                    <div class="ts-promo-number">--}}
            {{--                                        <h2>640</h2>--}}
            {{--                                        <h4 class="mb-0 ts-opacity__50">Properties</h4>--}}
            {{--                                    </div>--}}
            {{--                                    <!--end ts-promo-number-->--}}
            {{--                                </div>--}}
            {{--                                <!--end col-sm-3-->--}}

            {{--                                <div class="col-sm-3">--}}
            {{--                                    <div class="ts-promo-number">--}}
            {{--                                        <h2>350</h2>--}}
            {{--                                        <h4 class="mb-0 ts-opacity__50">Local Agents</h4>--}}
            {{--                                    </div>--}}
            {{--                                    <!--end ts-promo-number-->--}}
            {{--                                </div>--}}
            {{--                                <!--end col-sm-3-->--}}

            {{--                                <div class="col-sm-3">--}}
            {{--                                    <div class="ts-promo-number">--}}
            {{--                                        <h2>23</h2>--}}
            {{--                                        <h4 class="mb-0 ts-opacity__50">Years Experience</h4>--}}
            {{--                                    </div>--}}
            {{--                                    <!--end ts-promo-number-->--}}
            {{--                                </div>--}}
            {{--                                <!--end col-sm-3-->--}}

            {{--                                <div class="col-sm-3">--}}
            {{--                                    <div class="ts-promo-number">--}}
            {{--                                        <h2>67</h2>--}}
            {{--                                        <h4 class="mb-0 ts-opacity__50">Agencies</h4>--}}
            {{--                                    </div>--}}
            {{--                                    <!--end ts-promo-number-->--}}
            {{--                                </div>--}}
            {{--                                <!--end col-sm-3-->--}}

            {{--                            </div>--}}
            {{--                            <!--end row-->--}}
            {{--                        </div>--}}
            {{--                        <!--end ts-promo-numbers-->--}}
            {{--                    </div>--}}
            {{--                    <!--end container-->--}}
            {{--                </div>--}}
            {{--                <!--end #numbers-->--}}
            {{--            </section>--}}
            {{--        @endif--}}
            {{--        @if($datas->logosStatus==1)--}}
            {{--            <section id="partners">--}}
            {{--                <div class="ts-block py-4">--}}
            {{--                    <div class="container">--}}
            {{--                        <!--block of logos-->--}}
            {{--                        <div class="d-block d-md-flex justify-content-between align-items-center text-center ts-partners py-3">--}}
            {{--                            <a href="#">--}}
            {{--                                <img src="{{url('/public/assets/img/logo-01.png')}}" alt="">--}}
            {{--                            </a>--}}
            {{--                            <a href="#">--}}
            {{--                                <img src="{{url('/public/assets/img/logo-02.png')}}" alt="">--}}
            {{--                            </a>--}}
            {{--                            <a href="#">--}}
            {{--                                <img src="{{url('/public/assets/img/logo-03.png')}}" alt="">--}}
            {{--                            </a>--}}
            {{--                            <a href="#">--}}
            {{--                                <img src="{{url('/public/assets/img/logo-04.png')}}" alt="">--}}
            {{--                            </a>--}}
            {{--                            <a href="#">--}}
            {{--                                <img src="{{url('/public/assets/img/logo-05.png')}}" alt="">--}}
            {{--                            </a>--}}
            {{--                        </div>--}}
            {{--                        <!--end logos-->--}}
            {{--                    </div>--}}
            {{--                    <!--end container-->--}}
            {{--                </div>--}}
            {{--            </section>--}}
            {{--        @endif--}}
        </div>
    </main>
    </section>
@stop