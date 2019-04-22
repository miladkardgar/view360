@extends('users.layouts.master')
@section('title','پروفایل من')
@section('style')
    <link href="{{url('public/assets/admin/css/components.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('script')
    <script type="text/javascript"
            src="{{url('public/assets/admin/js/plugins/uploaders/fileinput/purify.min.js')}}"></script>
    <script type="text/javascript"
            src="{{url('public/assets/admin/js/plugins/uploaders/fileinput/sortable.min.js')}}"></script>
    <script type="text/javascript"
            src="{{url('public/assets/admin/js/plugins/uploaders/fileinput/fileinput.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
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
                            removeIcon: '<i class="icon-trash"></i>',
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
        })
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

        <section id="page-title">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-1 col-lg-10">
                        <div class="ts-title">
                            <h1>
                                <i class="fa fa-pencil-alt ts-opacity__30 mr-3"></i>
                                ویرایش مشخصات
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="edit-form">
            <div class="container">
                <div class="row">

                    <div class="offset-lg-1 col-lg-10">

                        <form id="form-edit" method="post" action="/profile/update/{{$userInfo->id}}" class="ts-form"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            <section id="location" class="mb-5">
                                <h3 class="text-muted border-bottom">مشخصات شما</h3>
                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="input-group">
                                            <label for="name">نام</label>
                                            <input type="text" class="form-control " id="name" name="name"
                                                   value="{{old('name')??$userInfo->name}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="family">نام خانوادگی</label>
                                            <input type="text" class="form-control" id="family" name="family"
                                                   value="{{old('family')??$userInfo->family}}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="mobile">شماره تماس</label>
                                            <input type="number" class="form-control" id="mobile" name="mobile"
                                                   value="{{old('mobile')??$userInfo->mobile}}" required>
                                        </div>


                                        <div class="form-group">
                                            <label for="naCode">کد ملی</label>
                                            <input type="number" class="form-control" id="naCode" name="naCode"
                                                   value="{{old('naCode')??$userInfo->naCode}}"
                                                   required>
                                        </div>

                                        <div class="form-group">
                                            <label for="mobile">پست الکترونیکی</label>
                                            <input type="email" class="form-control " readonly id="email"
                                                   value="{{old('email')??$userInfo->email}}" required>
                                        </div>

                                    </div>

                                    <div class="col-sm-6">
                                        <figure>
                                            @if(isset($userInfo->media_id))
                                                <img class="img-thumbnail rounded-circle" src="{{url($userInfo->fileInfo->file)}}">
                                            @else
                                                <img class="img-thumbnail rounded-circle" src="{{url("public/assets/img/person.png")}}">
                                            @endif
                                        </figure>

                                    </div>
                                    <div class="col-12 col-md-12">
                                        <h3 class="text-muted border-bottom">بارگزاری تصویر پروفایل</h3>
                                        <input type="file" class="file-input-ajax" name="file"
                                               accept=".jpg,.gif,.png"
                                               id="file">
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <h3 class="text-muted border-bottom">تغییر کلمه عبور</h3>
                                        <div class="form-group">
                                            <label for="password">کلمه عبور جدید</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="password">تکرار کلمه عبور جدید</label>
                                            <input type="password" class="form-control border-right-0"  name="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    @include('users.errors')
                                </div>
                            </section>
                            <section class="py-3">
                                <button type="submit" class="btn btn-primary btn-lg float-left">
                                    <i class="fa fa-save ts-opacity__50 mr-2"></i>
                                    ذخیره تغییرات
                                </button>

                            </section>
                        </form>


                    </div>
                    <!--end offset-lg-1 col-lg-10-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>

    </main>
@endsection
