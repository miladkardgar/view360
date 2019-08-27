@php
    $site_settings = app('site_settings');
@endphp
@section('title',$data->title)
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

@extends('users.layouts.master')
@section('script')

    <script src="{{url('/public/assets/js/magnifig.js')}}" type="text/javascript"></script>
    @if($con)
    <script src="{{url('/public/assets/js/krpano.js')}}"></script>
    <script>
            var vars = {};
            vars["plugin[vtoureditor].url"] = "plugins/vtoureditor.swf";
            vars["plugin[vtoureditor].keep"] = false;
            embedpano({
                swf: "{{url($swf)}}",
                xml: "{{url($xml)}}",
                target: "krpanoDIV",

                initvars: {design: "117"},
                html5: "auto",
                passQueryParameters: true
            });
        </script>
    @endif
@endsection
@section('body')

    <main id="ts-main" class="rtl">
        @if($con)
            <div id="krpanoDIV" style="width:100%;height:600px; direction: ltr"></div>
        @endif

        <section id="page-title" class="pt-2">
            <div class="container">
                <div class="d-block d-sm-flex justify-content-between">
                    <div class="ts-title mb-0">
                        <h1>{{$data->title}}</h1>
                        <h5 class="ts-opacity__90">
                            <i class="fa fa-map-marker text-primary"></i>
{{--                            {{$fileInfos->address}}--}}
                        </h5>
                    </div>
                </div>

            </div>
        </section>


        <section id="content">
            <div class="container">
                <div class="row flex-wrap-reverse">
                    <div class="col-md-5 col-lg-4">
                        <section style="background-color: #0bb630;
    text-align: center;
    padding-top: 20px;
    border-radius: .25rem;
">
                            <h3 style="color: #fff">مشخصات</h3>
                            <div class="ts-box m-2">

                                <dl class="ts-description-list__line mb-0">

                                    <dt>شماره فایل:</dt>
                                    <dd>#{{$fileInfos->id}}</dd>

                                    <dt>دسته بندی:</dt>
                                    <dd>{{$data->title}}</dd>

                                    <dt>نوع معامله:</dt>
                                    <dd>{{$fileInfos->transactionType->title}}</dd>

                                    <dt>تعداد خواب:</dt>
                                    <dd>{{$fileInfos->bedroom}}</dd>

                                    <dt>مساحت آپارتمان:</dt>
                                    <dd>{{$fileInfos->area}}<sup>2</sup></dd>

                                </dl>

                            </div>
                        </section>
                        <section class="contact-the-agent" style="background-color: #0b87b6;
    text-align: center;
    padding-top: 20px;
    border-radius: .25rem;
">
                            <h3 style="color: #fff">ارتباط با ما</h3>

                            <div class="ts-box m-2" >
                                <!--Agent Image & Phone-->
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
                        <section id="quick-info">
                            <h3>اطلاعات سریع</h3>
                            <div class="ts-quick-info ts-box">
                                <div class="row no-gutters">
                                    <div class="col-sm-3">
                                        <div class="ts-quick-info__item"
                                             data-bg-image="{{url('/public/assets/img/icon-quick-info-bed.png')}}">
                                            <h6>خواب</h6>
                                            <figure>{{$fileInfos->bedroom}}</figure>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="ts-quick-info__item"
                                             data-bg-image="{{url('/public/assets/img/icon-quick-info-area.png')}}">
                                            <h6>مساحت</h6>
                                            <figure>{{$fileInfos->area}}<sup>2</sup></figure>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="ts-quick-info__item"
                                             data-bg-image="{{url('/public/assets/img/icon-quick-info-pin.png')}}">
                                            <h6>شهر</h6>
                                            <figure>{{$fileInfos->getCity->name}}</figure>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="ts-quick-info__item"
                                             data-bg-image="{{url('/public/assets/img/icon-quick-info-region.png')}}">
                                            <h6>منطقه</h6>
                                            <figure>{{$fileInfos->getRegion->name}}</figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="description">

                            <h3>توضیحات</h3>

                            <p>{{$fileInfos->description}}</p>

                        </section>
                        <section id="features">

                            @if(isset($attrs))
                                <h3>ویژگی ها</h3>

                                <ul class="list-unstyled ts-list-icons ts-column-count-3 ts-column-count-sm-2 ts-column-count-md-2">
                                    @foreach($attrs as $attr)

                                        <li>
                                            <i class="{{$attr->getDataInfo->file}}"></i>
                                            {{$attr->getDataInfo->title}}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </section>
                        <section id="gallery-carousel">
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
                        <section id="map-location">

                            <h3>نقشه</h3>

                            <div class="ts-map ts-map__detail ts-border-radius__sm ts-shadow__sm" id="ts-map-simple"
                                 data-ts-map-leaflet-provider="https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}{r}.png"
                                 data-ts-map-zoom="12"
                                 data-ts-map-center-latitude="{{$fileInfos->lat}}"
                                 data-ts-map-center-longitude="{{$fileInfos->lon}}"
                                 data-ts-map-scroll-wheel="0"
                                 data-ts-map-controls="0"></div>

                        </section>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
