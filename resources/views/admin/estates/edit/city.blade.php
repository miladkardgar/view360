@extends('admin.layouts.admin_content_layout')
@php
        $name = "";
if(isset($req->getRegion->name)){
$name = $req->getRegion->name;
}
        @endphp
@section('title',$req->data->title ." | ". $req->id ." | ". $name)
@section('meta')
    <meta name="_token" content="{{csrf_token()}}"/>
@stop
@section('css')
    <link rel="stylesheet" href="{{ url('public/assets/admin/css/leaflet.css')}}">
    <link rel="stylesheet" href="{{ url('public/assets/admin/css/styles.css?v=1')}}">
    <link rel="stylesheet" href="{{ url('public/assets/admin/js/plugins/sweet/sweetalert2.min.css?v=1')}}">
@stop
@section('js')
    <script type="text/javascript" src="{{url('public/assets/admin/js/plugins/uploaders/fileinput/purify.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assets/admin/js/plugins/uploaders/fileinput/sortable.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assets/admin/js/plugins/uploaders/fileinput/fileinput.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assets/admin/js/plugins/sweet/sweetalert2.all.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assets/js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assets/js/magnifig.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assets/admin/js/custom.js')}}"></script>
    <script type="text/javascript"
            integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
            crossorigin="" src="{{url('public/assets/admin/js/leaflet.js')}}"></script>
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-indigo">
            <h4 class="text-center">{{$req->data->title}}</h4>
        </div>
        <div class="card-body text-black-50">
            <section id="gallery-carousel">
                <section id="gallery-carousel position-relative">
                    <h3>عکس ها</h3>
                    <div class="owl-carousel ts-gallery-carousel" data-owl-auto-height="1" data-owl-dots="1"
                         data-owl-loop="1">
                    @foreach($albums as $album)
                        <!--Slide-->
                            <div class="slide">
                                <div class="ts-image"
                                     data-bg-image="{{url($album->fileInfo->file)}}">
                                    <a href="{{url($album->fileInfo->file)}}"
                                       class="ts-zoom popup-image"><i
                                            class="fa fa-search-plus"></i>بزرگنمایی</a>
                                    <a href="javascript:;" onclick="deleteImage({{$album->fileInfo->id}})"
                                       class="ts-delete btn-danger"><i class="fa fa-trash"></i>حذف</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
                <div class="row pt-2">
                    <div class="col-6">
                        <h3>تصویر اصلی</h3>

                        @foreach($mains as $main)
                            <div class="slide">
                                <div class="ts-image" style="height: 300px;background-size: cover;"
                                     data-bg-image="{{url($main->fileInfo->file)}}">
                                    <a href="{{url($main->fileInfo->file)}}"
                                       class="ts-zoom popup-image"><i
                                            class="fa fa-search-plus"></i>بزرگنمایی</a>
                                    <a href="javascript:;" onclick="deleteImage({{$main->fileInfo->id}})"
                                       class="ts-delete btn-danger"><i class="fa fa-trash"></i>حذف</a>
                                </div>
                            </div>
                            {{--                            <img class='file-preview-image'  width="300" src='{{url($main->fileInfo->file)}}'>--}}
                        @endforeach
                    </div>
                    <div class="col-6">
                        <h3>فایل 3d</h3>

                        @foreach($images as $image)
                            @if($image->fileInfo->mime=="application/zip")
                                <div class="slide">
                                    <div class="ts-image" style="height: 300px;background-repeat: no-repeat;margin-left: auto; margin-right: auto"
                                         data-bg-image="{{url("public/assets/img/3d.png")}}">
                                        <a href="{{url("public/assets/img/3d.png")}}"
                                           class="ts-zoom popup-image"><i
                                                class="fa fa-search-plus"></i>بزرگنمایی</a>
                                        <a href="javascript:;" onclick="deleteImage({{$image->fileInfo->id}})"
                                           class="ts-delete btn-danger"><i class="fa fa-trash"></i>حذف</a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <hr>
            </section>
            <form action="/admin/estate/update/{{$req->id}}" method="post" enctype="multipart/form-data">
                {{method_field('patch')}}
                {{csrf_field()}}
                @include('admin.errors')
                <section id="information-section">
                    <input type="hidden" name="id" value="{{$req->id}}">
                    <input type="hidden" name="data_id" value="{{$req->data_id}}">
                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="city_type_id">نوع اطلاعات شهری</label>
                                <div class="col-12">
                                    <select name="city_type_id" id="city_type_id" class="form-control"
                                            required="required">
                                        <option value="">انتخاب نمایید.</option>
                                        @foreach($cityType as $type)
                                            <option value="{{$type->id}}"
                                                {{$type->id === old('city_type_id')?'selected':'' || $type->id === $req->city_type_id?'selected':''}}>{{$type->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="name">نام</label>
                                <div class="col-12">
                                    <input type="text" name="title" id="title" class="form-control" required="required"
                                           value="{{old('title')?? $req->title}}">
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
                                                    {{$parent->id === old('parent_id')?'selected':'' || $parent->id === $req->parent_id ?'selected':''}}>{{$parent->title}}</option>
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
                                          required>{{old('description') ?? $req->description}}</textarea>
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
                                           required="required" value="{{old('ownerName') ?? $req->ownerName}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="ownerPhone">شماره تلفن</label>
                                <div class="col-12">
                                    <input type="number" name="ownerPhone" id="ownerPhone" class="form-control"
                                           value="{{old('ownerPhone')?? $req->ownerPhone}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="address">آدرس ملک</label>
                                <div class="col-12">
                                    <input type="text" name="address" id="address" class="form-control"
                                           value="{{old('address')?? $req->address}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="form-group">
                                <label for="sub_id">ساب دامین</label>
                                <div class="col-12">
                                    <input type="text" value="{{old('sub_domain')?? $req->sub_domain}}" class="form-control" name="sub_domain" id="sub_domain">
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
                                <input type="hidden" name="lat" id="lat" value="{{old('lat')?? $req->lat}}">
                                <input type="hidden" name="lon" id="lon" value="{{old('lon')?? $req->lon}}">
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

