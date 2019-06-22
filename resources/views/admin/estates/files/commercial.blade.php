@extends('admin.layouts.admin_content_layout')
@section('meta')
    <meta name="_token" content="{{csrf_token()}}"/>
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
            src="{{url('public/assets/admin/js/plugins/uploaders/fileinput/purify.min.js')}}"></script>
    <script type="text/javascript"
            src="{{url('public/assets/admin/js/plugins/uploaders/fileinput/sortable.min.js')}}"></script>
    <script type="text/javascript"
            src="{{url('public/assets/admin/js/plugins/uploaders/fileinput/fileinput.min.js')}}"></script>
    <script type="text/javascript"
            integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
            crossorigin="" src="{{url('public/assets/admin/js/leaflet.js')}}"></script>
    <script>

        $(document).ready(function () {
            var mymap = L.map('mapid').setView([36.5122, 51.8585], 10);
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
                $("#lat").val(e.latlng.lat);
                $("#lon").val(e.latlng.lng);
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            var FileUpload = function () {
                var _componentFileUpload = function () {
                    if (!$().fileinput) {
                        console.warn('Warning - fileinput.min.js is not loaded.');
                        return;
                    }
                    var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
                        '  <div class="modal-content">\n' +
                        '    <div class="modal-header align-items-center">\n' +
                        '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
                        '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
                        '    </div>\n' +
                        '    <div class="modal-body">\n' +
                        '      <div class="floating-buttons btn-group"></div>\n' +
                        '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
                        '    </div>\n' +
                        '  </div>\n' +
                        '</div>\n';

                    // Buttons inside zoom modal
                    var previewZoomButtonClasses = {
                        toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
                        fullscreen: 'btn btn-light btn-icon btn-sm',
                        borderless: 'btn btn-light btn-icon btn-sm',
                        close: 'btn btn-light btn-icon btn-sm'
                    };

                    // Icons inside zoom modal classes
                    var previewZoomButtonIcons = {
                        prev: '<i class="icon-arrow-left32"></i>',
                        next: '<i class="icon-arrow-right32"></i>',
                        toggleheader: '<i class="icon-menu-open"></i>',
                        fullscreen: '<i class="icon-screen-full"></i>',
                        borderless: '<i class="icon-alignment-unalign"></i>',
                        close: '<i class="icon-cross2 font-size-base"></i>'
                    };

                    // File actions
                    var fileActionSettings = {
                        zoomClass: '',
                        zoomIcon: '<i class="icon-zoomin3"></i>',
                        dragClass: 'p-2',
                        dragIcon: '<i class="icon-three-bars"></i>',
                        removeClass: '',
                        removeErrorClass: 'text-danger',
                        removeIcon: '<i class="icon-bin"></i>',
                        indicatorNew: '<i class="icon-file-plus text-success"></i>',
                        indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
                        indicatorError: '<i class="icon-cross2 text-danger"></i>',
                        indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
                    };
                    //
                    // AJAX upload
                    //

                    $('.file-input-ajax').fileinput({
                        browseLabel: 'انتخاب فایل',
                        uploadUrl: "{{url('/admin/estates/upload')}}",
                        uploadAsync: false,
                        maxFileCount: 10,
                        showUpload: false,
                        removeLabel: "حذف همه",
                        initialPreview: [],
                        browseIcon: '<i class="icon-file-plus mr-2"></i>',
                        removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
                        browseOnZoneClick: true,
                        fileActionSettings: {
                            removeIcon: '<i class="icon-bin"></i>',
                            uploadClass: '',
                            zoomIcon: '<i class="icon-zoomin3"></i>',
                            zoomClass: '',
                            indicatorNew: '<i class="icon-file-plus text-success"></i>',
                            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
                            indicatorError: '<i class="icon-cross2 text-danger"></i>',
                            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>',
                        },
                        layoutTemplates: {
                            icon: '<i class="icon-file-check"></i>',
                            modal: modalTemplate
                        },
                        initialCaption: 'فایلی انتخاب نشده است',
                        previewZoomButtonClasses: previewZoomButtonClasses,
                        previewZoomButtonIcons: previewZoomButtonIcons
                    });
                    $('.file-input-ajax3d').fileinput({
                        browseLabel: 'انتخاب فایل',
                        uploadUrl: "{{url('/admin/estates/upload')}}",
                        uploadAsync: false,
                        maxFileCount: 1,
                        maxFileSize: 1000000,
                        showUpload: false,
                        removeLabel: "حذف همه",
                        initialPreview: [],
                        browseIcon: '<i class="icon-file-plus mr-2"></i>',
                        removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
                        browseOnZoneClick: true,
                        fileActionSettings: {
                            removeIcon: '<i class="icon-bin"></i>',
                            uploadClass: '',
                            zoomIcon: '<i class="icon-zoomin3"></i>',
                            zoomClass: '',
                            indicatorNew: '<i class="icon-file-plus text-success"></i>',
                            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
                            indicatorError: '<i class="icon-cross2 text-danger"></i>',
                            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>',
                        },
                        layoutTemplates: {
                            icon: '<i class="icon-file-check"></i>',
                            modal: modalTemplate
                        },
                        initialCaption: 'فایلی انتخاب نشده است',
                        previewZoomButtonClasses: previewZoomButtonClasses,
                        previewZoomButtonIcons: previewZoomButtonIcons
                    });
                    $('.file-input-ajaxMain').fileinput({
                        browseLabel: 'انتخاب فایل',
                        uploadUrl: "{{url('/admin/estates/upload')}}",
                        uploadAsync: false,
                        maxFileCount: 1,
                        showUpload: false,
                        removeLabel: "حذف همه",
                        initialPreview: [],
                        browseIcon: '<i class="icon-file-plus mr-2"></i>',
                        removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
                        browseOnZoneClick: true,
                        fileActionSettings: {
                            removeIcon: '<i class="icon-bin"></i>',
                            uploadClass: '',
                            zoomIcon: '<i class="icon-zoomin3"></i>',
                            zoomClass: '',
                            indicatorNew: '<i class="icon-file-plus text-success"></i>',
                            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
                            indicatorError: '<i class="icon-cross2 text-danger"></i>',
                            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>',
                        },
                        layoutTemplates: {
                            icon: '<i class="icon-file-check"></i>',
                            modal: modalTemplate
                        },
                        initialCaption: 'فایلی انتخاب نشده است',
                        previewZoomButtonClasses: previewZoomButtonClasses,
                        previewZoomButtonIcons: previewZoomButtonIcons
                    });

                    $('#btn-modify').on('click', function () {
                        $btn = $(this);
                        if ($btn.text() == 'Disable file input') {
                            $('#file-input-methods').fileinput('disable');
                            $btn.html('Enable file input');
                            alert('Hurray! I have disabled the input and hidden the upload button.');
                        } else {
                            $('#file-input-methods').fileinput('enable');
                            $btn.html('Disable file input');
                            alert('Hurray! I have reverted back the input to enabled with the upload button.');
                        }
                    });
                };

                return {
                    init: function () {
                        _componentFileUpload();
                    }
                }
            }();
            FileUpload.init();
        });
    </script>

@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-indigo">
            <h4 class="text-center ">{{$datas->title}}</h4>
        </div>
        <div class="card-body text-black-50">
            <form action="/admin/estate/add" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                @include('admin.errors')
                <section id="information-section">
                    <input type="hidden" name="data_id" value="{{$datas->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::id()}}">

                    <div class="row">
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="transaction_type">نوع معالمه</label>
                                <div class="col-12">
                                    <select name="transaction_type" id="transaction_type" class="form-control"
                                            required="required">
                                        <option value="">انتخاب نمایید.</option>
                                        @foreach($transactionTypesCommercial as $transactionTypeCommercial)
                                            <option
                                                value="{{$transactionTypeCommercial->id}}"
                                                {{$transactionTypeCommercial->id === Request::old('transaction_type')?'selected':''}}>{{$transactionTypeCommercial->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="commercialType">نوع واحد تجاری</label>
                                <div class="col-12">
                                    <select name="commercialType" id="commercialType" class="form-control"
                                            required="required">
                                        <option value="">انتخاب نمایید.</option>
                                        @foreach($commercialTypes as $commercialType)
                                            <option value="{{$commercialType->id}}"
                                                {{$commercialType->id === Request::old('commercialType')?'selected':''}}>{{$commercialType->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="area">متراژ</label>
                                <div class="col-12">
                                    <input type="number" class="form-control" min="1" max="10000000" name="area"
                                           id="area" value="{{Request::old('area')}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="name">نام</label>
                                <div class="col-12">
                                    <input type="text" name="title" id="title" class="form-control" required="required"
                                           value="{{Request::old('title')}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="parent_id">نام مجتمع</label>
                                <div class="col-12">
                                    @if(isset($parents) && $parents!="")
                                        <select name="parent_id" id="parent_id" class="form-control">
                                            <option value="">انتخاب نمایید.</option>
                                            @foreach($parents as $parent)
                                                <option value="{{$parent->id}}"
                                                    {{$parent->id===Request::old('parent_id')?'selected':''}}>{{$parent->title}}</option>
                                            @endforeach
                                        </select>
                                        <small class="text-info">اگر چنانچه این فایل مربوط به مجتمع خاصی است لطفاً نام
                                            مجتمع
                                            را از لیست بالا انتخاب نمایید.
                                        </small>
                                    @else
                                        <small>هیچ مجمتع ای در سیستم یافت نشد.</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="description">توضیحات</label>
                                <div class="col-12">
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control"
                                          required>{{Request::old('description')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="ownerInfo-section">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="ownerName">نام مالک یا واسط</label>
                                <div class="col-12">
                                    <input type="text" name="ownerName" id="ownerName" class="form-control"
                                           required="required" value="{{Request::old('ownerName')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="ownerPhone">شماره تلفن</label>
                                <div class="col-12">
                                    <input type="number" name="ownerPhone" id="ownerPhone" class="form-control"
                                           value="{{Request::old('ownerPhone')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="address">آدرس ملک</label>
                                <div class="col-12">
                                    <input type="text" name="address" id="address" class="form-control"
                                           value="{{Request::old('address')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="form-group">
                                <label for="sub_id">ساب دامین</label>
                                <div class="col-12">
                                                                        <input type="text" class="form-control" name="sub_domain" id="sub_domain">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="upload_section">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="file">تصاویر اصلی</label>
                                <input type="file" class="file-input-ajaxMain" multiple="multiple" name="fileMain[]"
                                       data-fouc accept=".jpg,.gif,.png"
                                       id="fileMain">
                                <span class="form-text text-muted">حداکثر یک تصویر قابل بارگذاری مباشد.</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="file">فایل 3D</label>
                                <input type="file" class="file-input-ajax3d" multiple="multiple" name="file3d[]"
                                       data-fouc accept=".zip"
                                       id="file3D">
                                <span class="form-text text-muted">حداکثر یک فایل قابل بارگذاری میباشد.</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="file">بارگزاری تصاویر</label>
                                <input type="file" class="file-input-ajax" multiple="multiple" name="file[]" data-fouc
                                       accept=".jpg,.gif,.png"
                                       id="file">
                                <span class="form-text text-muted">حداکثر ده عکس قابل بارگذاری میباشد.</span>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="location-section">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="mapid">موقعیت جغرافیایی</label>
                                <div id="mapid"></div>
                                <input type="hidden" name="lat" id="lat" value="">
                                <input type="hidden" name="lon" id="lon" value="">
                            </div>
                        </div>
                    </div>
                </section>
                <div class="col-12 col-md-12">
                    <button type="submit" class="btn btn-success float-right">ذخیره اطلاعات</button>
                </div>
            </form>
        </div>
    </div>
@endsection
