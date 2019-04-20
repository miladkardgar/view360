@extends('admin.layouts.admin_content_layout')
@section('title','تنظیمات سایت')

@section('meta')
@stop
@section('css')

    <link rel="stylesheet" href="{{ url('public/assets/admin/css/leaflet.css')}}">
    <style>
        #mapid {
            height: 480px;
        }
    </style>
@stop
@section('js')

    <script type="text/javascript"
            integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
            crossorigin="" src="{{url('public/assets/admin/js/leaflet.js')}}"></script>
    <script>
        $(document).ready(function () {

            var lat = "{{$info->site_lat}}";
            var lon = "{{$info->site_lon}}";
            var mymap = L.map('mapid').setView([lat, lon], 13);
            var marker = L.marker([lat, lon]).addTo(mymap);
            marker.bindPopup("<span>موقعیت فایل: </span>" + lat + " | " + lon + "<br>").openPopup();
            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWlsYWRrYXJkZ2FyIiwiYSI6ImNqdG9haWp4NTB2dHY0OXBkNmExc3UyZGsifQ.Ys_SvYFAN9ska6SCG7j8gg', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox.streets',
                accessToken: 'pk.eyJ1IjoibWlsYWRrYXJkZ2FyIiwiYSI6ImNqdG9haWp4NTB2dHY0OXBkNmExc3UyZGsifQ.Ys_SvYFAN9ska6SCG7j8gg',
            }).addTo(mymap);

            mymap.on('click', function (e) {
                $(".leaflet-marker-pane").html("");
                $(".leaflet-shadow-pane").html("");
                var marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(mymap);
                marker.bindPopup("<span>موقعیت فایل: </span>" + e.latlng.lat + " | " + e.latlng.lng + "<br>").openPopup();
                $("#site_lat").val(e.latlng.lat);
                $("#site_lon").val(e.latlng.lng);
            });
        });
    </script>
@stop
@section('content')
    <div class="card">
        <div class="card-body text-black-50">
            <form action="/setting/setting/update/{{$info->id}}" method="post">
                @method('PATCH')
                {{csrf_field()}}

                @include('admin.errors')
                <input type="hidden" name="id" value="{{$info->id}}">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="">توضیحات سایت</label>
                            <textarea name="site_description" class="form-control" id="site_description" cols="30"
                                      rows="4">{{ old('site_description')??$info->site_description}}</textarea>
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="site_title">عنوان سایت</label>
                            <input type="text" name="site_title" id="site_title" class="form-control"
                                   value="{{old('site_title')??$info->site_title}}">
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="site_url">آدرس سایت</label>
                            <input type="text" name="site_url" id="site_url" class="form-control"
                                   value="{{old('site_url')??$info->site_url }}">
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="site_email">ایمیل</label>
                            <input type="text" name="site_email" id="site_email" class="form-control"
                                   value="{{old('site_email')??$info->site_email}}">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="site_email2">ایمیل دوم</label>
                            <input type="text" name="site_email2" id="site_email2" class="form-control"
                                   value="{{old('site_email2')??$info->site_email2}}">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="site_tel">تلفن</label>
                            <input type="text" name="site_tel" id="site_tel" class="form-control"
                                   value="{{old('site_tel')??$info->site_tel}}">
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="site_tel2">تلفن دوم</label>
                            <input type="text" name="site_tel2" id="site_tel2" class="form-control"
                                   value="{{old('site_tel2')??$info->site_tel2}}">
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="site_mobile">شماره همراه</label>
                            <input type="text" name="site_mobile" id="site_mobile" class="form-control"
                                   value="{{old('site_mobile')??$info->site_mobile}}">
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="site_mobile2">شماره همراه دوم</label>
                            <input type="text" name="site_mobile2" id="site_mobile2" class="form-control"
                                   value="{{old('site_mobile2')??$info->site_mobile2}}">
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="site_fax">فکس</label>
                            <input type="text" name="site_fax" id="site_fax" class="form-control"
                                   value="{{old('site_fax')??$info->site_fax}}">
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="site_instagram"> آدرس اینستاگرام</label>
                            <input type="text" name="site_instagram" id="site_instagram" class="form-control"
                                   value="{{old('site_instagram')??$info->site_instagram}}">
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="site_telegram"> آدرس تلگرام</label>
                            <input type="text" name="site_telegram" id="site_telegram" class="form-control"
                                   value="{{old('site_telegram')??$info->site_telegram}}">
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="site_twitter"> آدرس توییتر</label>
                            <input type="text" name="site_twitter" id="site_twitter" class="form-control"
                                   value="{{old('site_twitter')??$info->site_twitter}}">
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="site_facebook"> آدرس فیسبوک</label>
                            <input type="text" name="site_facebook" id="site_facebook" class="form-control"
                                   value="{{old('site_facebook')??$info->site_facebook}}">
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="site_address">آدرس</label>
                            <input type="text" name="site_address" id="site_address" class="form-control"
                                   value="{{old('site_address')??$info->site_address}}">
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="site_address2">آدرس</label>
                            <input type="text" name="site_address2" id="site_address2" class="form-control"
                                   value="{{old('site_address2')??$info->site_address2}}">
                        </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="mapid">موقعیت جغرافیایی</label>
                            <div id="mapid"></div>
                            <input type="hidden" name="site_lat" id="site_lat" value="{{old('site_lat')?? $info->site_lat}}">
                            <input type="hidden" name="site_lon" id="site_lon" value="{{old('site_lon')?? $info->site_lon}}">
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <button class="btn btn-success float-right" type="submit">ذخیره اطلاعات</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
