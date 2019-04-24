@extends('users.layouts.pages')
@section('title','view360')
@section('body')

    <section id="ts-hero" class=" mb-0">
        <div class="ts-full-screen d-flex">
            <div class="ts-map w-100 ts-z-index__1">
                <div id="ts-map-hero" class="h-100 ts-z-index__1"
                     data-ts-map-leaflet-provider="https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}.png?accesstoken=sk.eyJ1IjoibWlsYWRrYXJkZ2FyIiwiYSI6ImNqdHN2czc4ZzAwMmk0YWx6b3pxc3djeGkifQ.14LK8WpxZqIvuqkFxbRe8g"
                     data-ts-map-leaflet-attribution="&copy; <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a> &copy; <a href='http://cartodb.com/attributions'>CartoDB</a>"
                     data-ts-map-zoom-position="topleft"
                     data-ts-map-scroll-wheel="0"
                     data-ts-map-zoom="9"
                     data-ts-map-center-latitude="36.5956023"
                     data-ts-map-center-longitude="52.2546367"
                     data-ts-locale="en-US"
                     data-ts-currency="USD"
                     data-ts-unit="m<sup>2</sup>"
                     data-ts-display-additional-info="area_Area;bedrooms_Bedrooms;bathrooms_Bathrooms">
                </div>
            </div>

            <div
                class="ts-results__vertical ts-results__grid ts-shadow__sm w-100 h-100 scrollbar-inner bg-white ts-z-index__2">
                <section class="ts-form__grid" data-bg-color="#f6f6f6">
                    <h4 class="font-weight-normal ts-text-color-light">فیلتر های جست و جو</h4>
                    <form class="ts-form ts-box mb-0">
                        <div class="form-row">
                            <div class="col-md-3">
                                <select class="custom-select mb-3" id="cityType" name="cityType">
                                    <option value="">نوع</option>
                                    @foreach($cityTypes as $cityType)
                                        <option value="{{$cityType->id}}">{{$cityType->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="custom-select mb-3" id="fileType" name="fileType">
                                    <option value="">نوع</option>
                                    @foreach($fileTypes as $fileType)
                                        <option value="{{$fileType->id}}">{{$fileType->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="custom-select mb-3" id="transactionType" name="transactionType">
                                    <option value="">وضعیت</option>
                                    @foreach($transactionTypes as $transactionType)
                                        <option value="{{$transactionType->id}}">{{$transactionType->title}}</option>
                                    @endforeach()
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="custom-select mb-3" id="usageType" name="usageType">
                                    <option value="">کاربری</option>
                                    @foreach($usageTypes as $usageType)
                                        <option value="{{$usageType->id}}">{{$usageType->title}}</option>
                                    @endforeach()
                                </select>
                            </div>

                            <div class="col-md-4">
                                <select class="custom-select mb-3" id="province_id" name="province_id">
                                    <option value="">استان</option>
                                    @foreach($provinces as $province)
                                        <option value="{{$province->id}}">
                                            {{$province->name}}</option>
                                    @endforeach()
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="custom-select mb-3" id="city_id" name="city_id">
                                    <option value="">شهر</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="custom-select mb-3" id="region_id" name="region_id">
                                    <option value="">منطقه</option>
                                </select>
                            </div>


                            <div class="col-sm-6">
                                <label for="min-area">کمترین متراژ</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control border-left-0" id="min-area">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-white border-right-0">متر مربع</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="max-area">بیشترین متراژ</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control border-left-0" id="max-area">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-white border-right-0">متر مربع</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ts-center__vertical justify-content-between">
                            <a href="#more-options-collapse" class="collapsed" data-toggle="collapse" role="button"
                               aria-expanded="false" aria-controls="more-options-collapse">
                                <i class="fa fa-plus-circle ts-text-color-primary mr-2 ts-visible-on-collapsed"></i>
                                <i class="fa fa-minus-circle ts-text-color-primary mr-2 ts-visible-on-uncollapsed"></i>
                                گزینه های بیشتر
                            </a>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary w-100" id="search-btn">جست و جو</button>
                            </div>

                        </div>
                        <div class="collapse" id="more-options-collapse">
                            <div class="pt-4">
                                <div class="form-row">

                                    <!--Bedrooms-->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="bedrooms">خواب</label>
                                            <input type="number" class="form-control" id="bedrooms" name="bedrooms"
                                                   min="0">
                                        </div>
                                    </div>

                                    <!--Bathrooms-->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="bathrooms">سالن</label>
                                            <input type="number" class="form-control" id="bathrooms" name="bathrooms"
                                                   min="0">
                                        </div>
                                    </div>

                                </div>
                                <div id="features-checkboxes" class="w-100">
                                    <h6 class="mb-3">ویژگی ها</h6>

                                    <div class="ts-column-count-3">

                                        @foreach($attrs as $attr)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_{{$attr->id}}"
                                                       name="attrs[]" value="{{$attr->id}}">
                                                <label class="custom-control-label" for="ch_{{$attr->id}}">{{$attr->title}}</label>
                                            </div>
                                        @endforeach

                                    </div>
                                    <!--end ts-column-count-3-->

                                </div>
                            </div>
                        </div>
                    </form>
                </section>

                <section class="ts-center__vertical justify-content-between px-4 pt-3 pb-0 rtl">
                    <h4 class="font-weight-normal ts-text-color-light mb-0">نتایج جست و جو</h4>

                    <div id="display-control" class="d-none d-md-block">

                        <a href="#" class="btn btn-outline-secondary active px-3 mr-2 mb-2 ts-btn-border-muted">
                            <i class="fa fa-th-large"></i>
                        </a>
                        <a href="#" class="btn btn-outline-secondary px-3 mb-2 ts-btn-border-muted">
                            <i class="fa fa-th-list"></i>
                        </a>
                    </div>

                </section>

                <!-- RESULTS
                =====================================================================================================-->
                <section id="ts-results" class="h-100 rtl">
                    <div class="ts-results-wrapper"></div>
                </section>

            </div>
            <!--end ts-results-vertical-->

        </div>
        <!--end full-screen-->
        @include('users.session')

    </section>
@endsection

@section('meta')
    <meta name="_token" content="{{csrf_token()}}"/>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $(document).on("change",'#city_id', function () {
                var cID = $(this).val();
                $.ajax({
                    url: "{{url('ajax/cityList')}}",
                    data: {id: cID},
                    method: "POST",
                    success: function (result) {
                        $("#region_id").html("");
                        $("#region_id").append("<option value=''>منطقه</option>");
                        $.each(result, function (i, item) {
                            $("#region_id").append("<option value='" + item.id + "'>" + item.name + "</option>")
                        })
                    },
                    error() {
                        console.log("error get area list");
                    }
                })
            })

            $(document).on("change",'#province_id', function () {
                var pID = $(this).val();
                $.ajax({
                    url: "{{url('ajax/cityList')}}",
                    data: {id: pID},
                    method: "POST",
                    success: function (result) {
                        $("#city_id").html("");
                        $("#city_id").append("<option value=''>شهر</option>");
                        $("#region_id").html("");
                        $.each(result, function (i, item) {
                            $("#city_id").append("<option value='" + item.id + "'>" + item.name + "</option>")
                        });
                        $("#city_id").change();
                    },
                    error() {
                        console.log("error get area list");
                    }
                })
            });
        })
    </script>
@endsection
