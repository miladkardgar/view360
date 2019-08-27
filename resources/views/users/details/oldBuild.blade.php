@php
    $site_settings = app('site_settings');
@endphp
@section('title',$data->title)

@extends('users.layouts.master')
@section('script')
    <script src="{{url('/public/assets/js/krpano.js')}}"></script>
    <script src="{{url('/public/assets/js/magnifig.js')}}" type="text/javascript"></script>
    <script>
        embedpano({
            swf: "{{url('/public/assets/js/krpano/krpano.swf')}}",
            xml: "{{url('/public/assets/js/krpano/test.xml')}}",
            target: "krpanoDIV",
            html5: "only",
            value: '159'
        });
    </script>
    <script>

    </script>
@endsection
@section('body')

    <main id="ts-main">

        <!--BREADCRUMB
            =========================================================================================================-->
        <section id="breadcrumb">
            <div class="container">
                <nav aria-label="breadcrumb">
                    {{--                    <ol class="breadcrumb">--}}
                    {{--                        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                    {{--                        <li class="breadcrumb-item"><a href="#">Library</a></li>--}}
                    {{--                        <li class="breadcrumb-item active" aria-current="page">Data</li>--}}
                    {{--                    </ol>--}}
                </nav>
            </div>
        </section>

        <section id="gallery-carousel" class="">
            <div class="owl-carousel ts-gallery-carousel ts-gallery-carousel__multi" data-owl-dots="1"
                 data-owl-items="3" data-owl-center="1" data-owl-loop="1">
                @foreach($medias as $media)
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

        <section id="page-title" class="border-bottom ts-white-gradient">
            <div class="container">

                <div class="d-block d-sm-flex justify-content-between">

                    <!--Title-->
                    <div class="ts-title mb-0">
                        <h1>{{$data->title}}</h1>
                        <h5 class="ts-opacity__90"><i class="fa fa-map-marker text-primary"></i>
{{--                            {{$fileInfos->address}}--}}
                        </h5>
                    </div>

                </div>

            </div>
        </section>

        <!--CONTENT
            =========================================================================================================-->
        <section id="content">
            <div class="container">
                <div class="row flex-wrap-reverse">

                    <div class="col-md-5 col-lg-4">
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
                                <div class="p-3 ts-text-color-light">
                                    <i class="fa fa-map-marker mr-2"></i>{{$fileInfos->address}}
                                </div>
                            </div>

                        </section>
                        <section class="contact-the-agent">
                            <h3>ارتباط با ما</h3>
                            <div class="ts-box">

                                <!--Agent Image & Phone-->
                                <div class="ts-center__vertical mb-4">
                                    <a href="#" class="ts-circle p-5 mr-4 ts-shadow__sm"
                                       data-bg-image="{{url('/public/assets/img/person.png')}}"></a>
                                    <figure class="mb-0">
                                        <h5 class="mb-0">{{$site_settings->site_title}}
                                        </h5>
                                        <p class="mb-0">
                                            <i class="fa fa-phone-square ts-opacity__50 mr-2"></i>
                                            {{$site_settings->site_tel}}
                                        </p>
                                    </figure>
                                </div>
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
                                    @if(session('result'))
                                        @include('users.session')
                                    @endif
                                    @if($errors->any())
                                        @include('users.errors')
                                    @endif
                                </form>
                            </div>
                        </section>

                    </div>
                    <div class="col-md-7 col-lg-8">
                        <section id="description">

                            <h3>توضیحات</h3>

                            <p>{{$fileInfos->description}}</p>

                            <dl class="ts-description-list__line mb-0 ts-column-count-2">

                                <dt>شماره فایل:</dt>
                                <dd class="border-bottom pb-2">#{{$fileInfos->id}}</dd>

                                <dt>دسته بندی:</dt>
                                <dd class="border-bottom pb-2">{{$data->title}}</dd>

                                <dt>نوع معامله:</dt>
                                <dd class="border-bottom pb-2">{{$fileInfos->transactionType->title}}</dd>

                                <dt>نوع سند:</dt>
                                <dd class="border-bottom pb-2">{{$fileInfos->ownershipDocumentStatus->title}}</dd>

                                <dt>کاربری:</dt>
                                <dd class="border-bottom pb-2">{{$fileInfos->usage->title}}</dd>

                                <dt>مساحت:</dt>
                                <dd class="border-bottom pb-2">{{$fileInfos->area}}<sup>2</sup></dd>
                                <dt>مساحت بنای کلنگی:</dt>
                                <dd class="border-bottom pb-2">{{$fileInfos->oldArea}}<sup>2</sup></dd>
                            </dl>

                        </section>
                        <div id="krpanoDIV" style="width:100%;height:500px;"></div>

                    </div>

                </div>
            </div>
        </section>
    </main>

@endsection
