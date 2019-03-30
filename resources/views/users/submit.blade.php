@extends('users.layouts.master')
@section('body')
    @php
        $site_settings = app('site_settings');
    @endphp
    <main id="ts-main" class="rtl">

        <!--BREADCRUMB
            =========================================================================================================-->
        <section id="breadcrumb">
            <div class="container">
                <nav aria-label="breadcrumb">
                    {{--<ol class="breadcrumb">--}}
                        {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                        {{--<li class="breadcrumb-item"><a href="#">Library</a></li>--}}
                        {{--<li class="breadcrumb-item active" aria-current="page">Data</li>--}}
                    {{--</ol>--}}
                </nav>
            </div>
        </section>
        <section id="page-title">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-1 col-lg-10">
                        <div class="ts-title">
                            <h1>ارسال فایل</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="submit-form">
            <div class="container">
                <div class="row">

                    <div class="offset-lg-1 col-lg-10">

                        <form id="form-submit" class="ts-form">

                            <section id="alert">
                                <div class="alert alert-primary p-5 d-block d-sm-flex align-items-center mb-5" role="alert" data-bg-color="rgba(230,230,255,.2)">

                                    <!--ICON-->
                                    <i class="fa fa-exclamation-triangle display-4 font-weight-bold ts-opacity__30 mr-5 py-2"></i>

                                    <!--CONTENT-->
                                    <aside>
                                        <h5 class="font-weight-normal">لطفاً قبل از ارسال فایل وارد یا عضو سایت شوید.</h5>
                                        <p>
                                            برای استفاده از تمامی امکانات سایت و ارسال فایل نیاز است وارد سایت شوید. در صورتی که حساب کاربری ندارید میتوانید با تکمیل عضویت حساب کاربری خود را فعال نمایید و سپس فایل مورد نظر را ارسال نمایید.
                                        </p>
                                        <a href="register" class="btn btn-light btn-xs">عضویت</a>
                                        <a href="login" class="btn btn-light btn-xs">ورود</a>
                                    </aside>
                                </div>
                                <!--end alert-->

                            </section>

                            <!--BASIC INFORMATION
                                =====================================================================================-->
                            <section id="basic-information" class="mb-5">

                                <!--Title-->
                                <h3 class="text-muted border-bottom">اطلاعات سطحی</h3>

                                <!--Row-->
                                <div class="row">

                                    <!--Title-->
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="title">عنوان</label>
                                            <input type="text" class="form-control" id="title" name="title" required>
                                        </div>
                                    </div>

                                    <!--Price-->
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <label for="price">قیمت</label>
                                            <input type="text" class="form-control border-right-0" id="price">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-white border-left-0">ریال</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4">

                                        <div class="row">

                                            <!--Area-->
                                            <div class="col">
                                                <div class="input-group">
                                                    <label for="area">متراژ</label>
                                                    <input type="text" class="form-control border-right-0" id="area">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text bg-white border-left-0">m<sup>2</sup></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Rooms-->
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="rooms">اتاق ها</label>
                                                    <input type="number" class="form-control" id="rooms" name="rooms" min="0" required>
                                                </div>
                                            </div>

                                        </div>
                                        <!--end row-->

                                    </div>
                                    <!--end col-md-4-->

                                    <!--Type Select-->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="type">نوع</label>
                                            <select class="custom-select" id="type" name="type">
                                                <option value="">انتخاب نمایید</option>
                                                <option value="1">آپارتمان</option>
                                                <option value="2">ویلا</option>
                                                <option value="3">زمین</option>
                                                <option value="4">پارکینگ</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!--Status Select-->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="status">نوع فایل</label>
                                            <select class="custom-select" id="status" name="status">
                                                <option value="">انتخاب نمایید.</option>
                                                <option value="1">فروش</option>
                                                <option value="2">اجاره</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <!--end row-->
                            </section>

                            <!--LOCATION
                                =====================================================================================-->
                            <section id="location" class="mb-5">

                                <!--Title-->
                                <h3 class="text-muted border-bottom">منطقه</h3>

                                <div class="row">

                                    <div class="col-sm-6">

                                        <!--Address-->
                                        <div class="input-group">
                                            <label for="address">آدرس</label>
                                            <input type="text" class="form-control border-right-0" id="address">
                                            <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="Find My Location">
                                                <a href="#" class="input-group-text bg-white border-left-0 ">
                                                    <i class="fa fa-map-marker ts-text-color-primary"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <!--City-->
                                        <div class="form-group">
                                            <label for="city">شهر</label>
                                            <input type="text" class="form-control" id="city" name="city" required>
                                        </div>

                                        <!--State-->
                                        <div class="form-group">
                                            <label for="state">منطقه</label>
                                            <input type="text" class="form-control" id="state" name="state" required>
                                        </div>

                                        <!--ZIP-->
                                        <div class="form-group mb-0">
                                            <label for="zip">کد پستی</label>
                                            <input type="number" class="form-control" id="zip" name="zip" required>
                                        </div>

                                    </div>
                                    <!--end col-md-6-->

                                    <!--Map-->
                                    <div class="col-sm-6">
                                        <div id="ts-map-simple" class="ts-map ts-shadow__sm h-100"
                                             data-ts-map-leaflet-provider="https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}{r}.png"
                                             data-ts-map-zoom="10"
                                             data-ts-map-center-latitude="{{$site_settings->site_lat}}"
                                             data-ts-map-center-longitude="{{$site_settings->site_lon}}"
                                             data-ts-map-scroll-wheel="1"
                                             data-ts-map-controls="0"
                                             data-ts-map-marker-drag="1">
                                        </div>
                                    </div>
                                    <!--end col-md-6-->

                                </div>
                                <!--end row-->
                            </section>
                            <!--end #location-->

                            <!--GALLERY
                                =====================================================================================-->
                            <section id="gallery" class="mb-5">

                                <!--Title-->
                                <h3 class="text-muted border-bottom">گالری</h3>

                                <!--File upload-->
                                <div class="file-upload-previews"></div>
                                <div class="file-upload">
                                    <input type="file" name="files[]" class="file-upload-input with-preview" multiple title="Click to add files" maxlength="10" accept="gif|jpg|png">
                                    <span><i class="fa fa-plus-circle"></i>برای ارسال عکس کلیک نمایید.</span>
                                </div>

                            </section>

                            <!--ADDITIONAL INFORMATION
                                =====================================================================================-->
                            <section id="additional-information" class="mb-5">

                                <!--Title-->
                                <h3 class="text-muted border-bottom">اطلاعات بیشتر</h3>

                                <!--Description-->
                                <div class="form-group">
                                    <label for="description">توضیحات</label>
                                    <textarea class="form-control" id="description" rows="4" name="description"></textarea>
                                </div>

                                <!--Row-->
                                <div class="row">

                                    <!--Bedrooms-->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="bedrooms">خواب</label>
                                            <input type="number" class="form-control" id="bedrooms" name="bedrooms" min="0">
                                        </div>
                                    </div>

                                    <!--Bathrooms-->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="bathrooms">حمام</label>
                                            <input type="number" class="form-control" id="bathrooms" name="bathrooms" min="0">
                                        </div>
                                    </div>

                                    <!--Garages-->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="garages">پارکینگ</label>
                                            <input type="number" class="form-control" id="garages" name="garages" min="0">
                                        </div>
                                    </div>

                                </div>
                                <!--end row-->

                                <div id="features-checkboxes">
                                    <h6 class="mb-3">ویژگی ها</h6>

                                    <!--Checkboxes-->
                                    <div class="ts-column-count-3">

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_1" name="features[]" value="ch_1">
                                            <label class="custom-control-label" for="ch_1">تهویه مطبوع</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_2" name="features[]" value="ch_2">
                                            <label class="custom-control-label" for="ch_2">ملافه</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_3" name="features[]" value="ch_3">
                                            <label class="custom-control-label" for="ch_3">حوله</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_4" name="features[]" value="ch_4">
                                            <label class="custom-control-label" for="ch_4">اینترنت</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_5" name="features[]" value="ch_5">
                                            <label class="custom-control-label" for="ch_5">ماکروفر</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_6" name="features[]" value="ch_6">
                                            <label class="custom-control-label" for="ch_6">سیگار</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_7" name="features[]" value="ch_7">
                                            <label class="custom-control-label" for="ch_7">تراس</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_8" name="features[]" value="ch_8">
                                            <label class="custom-control-label" for="ch_8">بالکن</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_9" name="features[]" value="ch_9">
                                            <label class="custom-control-label" for="ch_9">آهن</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_10" name="features[]" value="ch_10">
                                            <label class="custom-control-label" for="ch_10">Hi-Fi</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_11" name="features[]" value="ch_11">
                                            <label class="custom-control-label" for="ch_11">ساحل دریا</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_12" name="features[]" value="ch_12">
                                            <label class="custom-control-label" for="ch_12">پارکینگ</label>
                                        </div>

                                    </div>
                                    <!--end ts-column-count-3-->

                                </div>
                                <!--end #features-checkboxes-->

                            </section>
                            <!--end #additional-information-->

                            <hr>

                            <section class="py-3">
                                <a href="#" class="btn btn-outline-secondary btn-lg float-right">
                                    <i class="fa fa-save mr-2"></i>ذخیره
                                </a>
                                <button type="submit" onclick="window.location='preview'" class="btn btn-primary ts-btn-arrow btn-lg float-left">نمایش
                                </button>
                            </section>

                        </form>
                        <!--end #form-submit-->

                    </div>
                    <!--end offset-lg-1 col-lg-10-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>

    </main>
@endsection