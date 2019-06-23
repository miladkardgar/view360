@php
    $site_settings = app('site_settings');
@endphp
@section('title',$data->title)
@extends('users.layouts.master')
{!! $con = false !!}
@foreach($medias3d as $m3)
    @if($m3->fileInfo->mime=="xml")
        @php
            $xml = $m3->fileInfo->file;
        @endphp
    @elseif($m3->fileInfo->mime=="swf")
        @php
            $swf = $m3->fileInfo->file;
            $con = true;
        @endphp
    @endif
@endforeach
@section('script')
    <script src="{{url('/public/assets/js/magnifig.js')}}" type="text/javascript"></script>
    @if($con)
        <script src="{{url('/public/assets/js/krpano.js')}}"></script>
        <script>
            var vars = {};
            vars["plugin[vtoureditor].url"] = "plugins/vtoureditor.swf";
            vars["plugin[vtoureditor].keep"] = true;
            embedpano({
                swf: "{{url($swf)}}",
                xml: "{{url($xml)}}",
                target: "krpanoDIV",
                initvars: {design: "flat"},
                html5: "auto",
                passQueryParameters: true
            });
        </script>
    @endif
@endsection
<style>
    .kr-hei {
        height: 650px;
    }
    @media only screen and (max-width: 600px) {
        .kr-hei {
            height: 400px;
        }
    }
</style>
@section('body')
    <main id="ts-main" class="rtl">
        <section id="breadcrumb">
            <div class="container">
                {{--<nav aria-label="breadcrumb">--}}
                {{--<ol class="breadcrumb">--}}
                {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                {{--<li class="breadcrumb-item"><a href="#">Library</a></li>--}}
                {{--<li class="breadcrumb-item active" aria-current="page">Data</li>--}}
                {{--</ol>--}}
                {{--</nav>--}}
            </div>
        </section>

        <section id="page-title">
            @if($con)
                <div id="krpanoDIV" class="kr-hei" style="width:100%; direction: ltr!important;"></div>
            @endif
            <div class="container pt-2">
                <div class="d-block d-sm-flex justify-content-between">
                    <!--Title-->
                    <div class="ts-title mb-0">
                        <h1>{{$data->title}}</h1>
                        <h5 class="ts-opacity__90">
                            <i class="fa fa-map-marker text-primary"></i>
                            {{$fileInfos->address}}
                        </h5>
                    </div>
                </div>
            </div>
        </section>

        <section id="content">
            <div class="container rtl">
                <div class="row flex-wrap rtl">
                    <div class="col-md-5 col-lg-4">
                        <section>
                            <h3>مشخصات</h3>
                            <div class="ts-box rtl">

                                <dl class="ts-description-list__line mb-0 rtl">
                                    <dt>شماره فایل:</dt>
                                    <dd>#{{$fileInfos->id}}</dd>

                                    <dt>دسته بندی:</dt>
                                    <dd>{{$data->title}}</dd>

                                    <dt>نوع معامله:</dt>
                                    <dd>{{$fileInfos->transactionType->title}}</dd>

                                    <dt>نوع سند:</dt>
                                    <dd>{{$fileInfos->ownershipDocumentStatus->title}}</dd>

                                    <dt>کاربری:</dt>
                                    <dd>{{$fileInfos->usage->title}}</dd>

                                    <dt>متراژ:</dt>
                                    <dd>{{$fileInfos->area}}<sup>2</sup></dd>
                                </dl>

                            </div>
                        </section>
                        <section id="location">
                            <h3>موقعیت</h3>

                            <div class="ts-box p-0">

                                <div class="ts-map ts-map__detail" id="ts-map-simple"
                                     data-ts-map-leaflet-provider="https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}{r}.png"
                                     data-ts-map-zoom="12"
                                     data-ts-map-center-latitude="{{$fileInfos->lat}}"
                                     data-ts-map-center-longitude="{{$fileInfos->lon}}"
                                     data-ts-map-scroll-wheel="1"
                                     data-ts-map-controls="0"></div>

                                <dl class="ts-description-list__line mb-0 p-4">

                                    <dt><i class="fa fa-map-marker ts-opacity__30 mr-2"></i>آدرس:</dt>
                                    <dd class="border-bottom pb-2">{{$fileInfos->address}}</dd>

                                    {{--                                    <dt><i class="fa fa-phone-square ts-opacity__30 mr-2"></i>تلفن:</dt>--}}
                                    {{--                                    <dd class="border-bottom pb-2">+1 602-862-1673</dd>--}}

                                    {{--                                    <dt><i class="fa fa-envelope ts-opacity__30 mr-2"></i>پست الکترونیکی:</dt>--}}
                                    {{--                                    <dd class="border-bottom pb-2"><a href="#">hello@property.com</a></dd>--}}

                                    {{--                                    <dt><i class="fa fa-globe ts-opacity__30 mr-2"></i>سایت:</dt>--}}
                                    {{--                                    <dd><a href="#">www.property.com</a></dd>--}}

                                </dl>

                            </div>

                        </section>
                    </div>
                    <div class="col-md-7 col-lg-8">

                        <section id="gallery-carousel position-relative">

                            <h3>عکس ها</h3>

                            <div class="owl-carousel ts-gallery-carousel" data-owl-auto-height="1" data-owl-dots="1"
                                 data-owl-loop="1">

                            @foreach($medias as $media)
                                <!--Slide-->
                                    <div class="slide">
                                        <div class="ts-image"
                                             data-bg-image="{{url($media->fileInfo->file)}}">
                                            <a href="{{url($media->fileInfo->file)}}"
                                               class="ts-zoom popup-image"><i
                                                        class="fa fa-search-plus"></i>بزرگنمایی</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </section>
                        <section id="description">
                            <h3>توضیحات</h3>
                            <p>{{$fileInfos->description}}</p>
                        </section>
                        <section class="contact-the-agent">
                            <h3>ارتباط با نماینده:</h3>

                            <div class="ts-box">
                                <div class="row">

                                    <!--Agent Image & Phone-->
                                    <div class="col-md-5">
                                        <div class="ts-center__vertical mb-4">

                                            <!--Image-->
                                            <a href="#" class="ts-circle p-5 mr-4 ts-shadow__sm"
                                               data-bg-image="{{url('/public/assets/img/person.png')}}"></a>

                                            <!--Phone contact-->
                                            <figure class="mb-0">
                                                <h5 class="mb-0">{{$site_settings->site_title}}
                                                </h5>
                                                <p class="mb-0">
                                                    <i class="fa fa-phone-square ts-opacity__50 mr-2"></i>
                                                    {{$site_settings->site_tel}}
                                                </p>
                                            </figure>

                                        </div>

                                        <hr>

                                        <p>
                                            برای دریافت اطلاعات بیشتر در مورد این فایل از طریق فرم مقابل با ما در ارتباط
                                            باشید.
                                        </p>

                                    </div>

                                    <!--Agent contact form-->
                                    <div class="col-md-7">
                                        <h4>ارتباط با ما</h4>
                                        <form id="form-agent" class="ts-form" method="post"
                                              action="/contact/{{$fileInfos->id}}/store">
                                            {{csrf_field()}}
                                            <input type="hidden" name="file_id" value="{{$fileInfos->id}}">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="name" name="name"
                                                       placeholder="نام و نام خانوادگی">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" id="email" name="email"
                                                       placeholder="ایمیل">
                                            </div>
                                            <div class="form-group">
                                                <input type="number" class="form-control" id="phone" name="phone"
                                                       placeholder="شماره تماس">
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" id="form-contact-message" rows="3"
                                                          name="message"
                                                          placeholder="">سلام در مورد شماره فایل {{$fileInfos->id}}  اطلاعات بیشتری نیاز دارم.</textarea>
                                            </div>
                                            <div class="form-group clearfix mb-0">
                                                <button type="submit" class="btn btn-primary float-left"
                                                        id="form-contact-submit">ارسال پیام
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    @if(session('result'))
                                        @include('users.session')
                                    @endif
                                    @if($errors->any())
                                        @include('users.errors')
                                    @endif
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
