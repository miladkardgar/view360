@extends('users.layouts.pages')
@section('title','view360')
@section('body')
    <section id="ts-hero" class=" mb-0">
        <div class="ts-full-screen ts-has-horizontal-results w-1001 d-flex1 flex-column1">
            <div class="ts-map ts-shadow__sm">
                <div class="ts-form__map-search ts-z-index__2">
                    <!--Form-->

                    <form class="ts-form">
                        <!--Collapse button-->
                        <a href=".ts-form-collapse" data-toggle="collapse" class="ts-center__vertical justify-content-between collapsed" aria-expanded="false">فیلتر های جست و جو</a>
                        <!--Form-->
                        <div class="ts-form-collapse ts-xs-hide-collapse collapse">

                            <select class="custom-select mb-3" id="fileType" name="fileType">
                                <option value="">نوع</option>
                                @foreach($fileTypes as $fileType)
                                    <option value="{{$fileType->id}}">{{$fileType->title}}</option>
                                @endforeach
                            </select>

                            <select class="custom-select mb-3" id="transactionType" name="transactionType">
                                <option value="">وضعیت</option>
                                @foreach($transactionTypes as $transactionType)
                                    <option value="{{$transactionType->id}}">{{$transactionType->title}}</option>
                                @endforeach()
                            </select>

                            <select class="custom-select mb-3" id="usageType" name="usageType">
                                <option value="">کاربری</option>
                                @foreach($usageTypes as $usageType)
                                    <option value="{{$usageType->id}}">{{$usageType->title}}</option>
                                @endforeach()
                            </select>
                            <select class="custom-select mb-3" id="province_id" name="province_id">
                                <option value="">استان</option>
                                @foreach($provinces as $province)
                                    <option value="{{$province->id}}">
                                        {{$province->name}}</option>
                                @endforeach()
                            </select>
                            <select class="custom-select mb-3" id="city_id" name="city_id">
                                <option value="">شهر</option>
                            </select>
                            <select class="custom-select mb-3" id="region_id" name="region_id">
                                <option value="">منطقه</option>
                            </select>

                            <!--Submit button-->
                            <div class="form-group mt-2 mb-3">
                                <button type="submit" class="btn btn-primary w-100" id="search-btn">جست و جو</button>
                            </div>

                        </div>
                        <!--end ts-form-collapse-->
                    </form>
                    <!--end ts-form-->
                </div>
                <!--end ts-form__map-search-->
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
                <div id="ts-results" class="ts-results__horizontal scrollbar-inner dragscroll">

                    <div class="ts-results-wrapper"></div>
                </div>

            </div>
            <!-- RESULTS
            =========================================================================================================-->

        </div>
        <!--end full-screen-->

    </section>
    <!--end ts-hero-->
@endsection
@section('meta')
    <meta name="_token" content="{{csrf_token()}}"/>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(document).on("change",'#city_id', function () {
                var cID = $(this).val();
                $.ajax({
                    url: "{{url('ajax/cityList')}}",
                    data: {id: cID},
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
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
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
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
