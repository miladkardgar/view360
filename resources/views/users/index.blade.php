@extends('users.layouts.pages')
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

            <div class="ts-results__vertical ts-results__grid ts-shadow__sm w-100 h-100 scrollbar-inner bg-white ts-z-index__2">
                <section class="ts-form__grid" data-bg-color="#f6f6f6">
                    <h4 class="font-weight-normal ts-text-color-light">فیلتر های جست و جو</h4>
                    <form class="ts-form ts-box mb-0">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="keyword" name="keyword"
                                           placeholder="آدرس٬ شهر...">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="custom-select mb-3" id="type" name="category">
                                    <option value="">نوع</option>
                                    <option value="1">آپارتمان</option>
                                    <option value="2">ویلا</option>
                                    <option value="3">زمین</option>
                                    <option value="4">کارگاه</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="custom-select mb-3" id="status" name="status">
                                    <option value="">وضعیت</option>
                                    <option value="1">فروش</option>
                                    <option value="2">رهن</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label for="min-area">کمترین متراژ</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control border-left-0" id="min-area">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-white border-right-0">متر مربع</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label for="max-area">بیشترین متراژ</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control border-left-0" id="max-area">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-white border-right-0">متر مربع</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label for="min-price">کمترین قیمت</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control border-left-0" id="min-price">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-white border-right-0">تومان</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label for="max-price">بیشترین قیمت</label>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control border-left-0" id="max-price">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-white border-right-0">تومان</span>
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

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_1"
                                                   name="features[]" value="ch_1">
                                            <label class="custom-control-label" for="ch_1">تهویه هوا</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_2"
                                                   name="features[]" value="ch_2">
                                            <label class="custom-control-label" for="ch_2">تخت خواب</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_3"
                                                   name="features[]" value="ch_3">
                                            <label class="custom-control-label" for="ch_3">گرمایش</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_4"
                                                   name="features[]" value="ch_4">
                                            <label class="custom-control-label" for="ch_4">اینترنت</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_5"
                                                   name="features[]" value="ch_5">
                                            <label class="custom-control-label" for="ch_5">ماکروفر</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_6"
                                                   name="features[]" value="ch_6">
                                            <label class="custom-control-label" for="ch_6">سیگار</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_7"
                                                   name="features[]" value="ch_7">
                                            <label class="custom-control-label" for="ch_7">Terrace</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_8"
                                                   name="features[]" value="ch_8">
                                            <label class="custom-control-label" for="ch_8">Balcony</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_9"
                                                   name="features[]" value="ch_9">
                                            <label class="custom-control-label" for="ch_9">Iron</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_10"
                                                   name="features[]" value="ch_10">
                                            <label class="custom-control-label" for="ch_10">Hi-Fi</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_11"
                                                   name="features[]" value="ch_11">
                                            <label class="custom-control-label" for="ch_11">Beach</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ch_12"
                                                   name="features[]" value="ch_12">
                                            <label class="custom-control-label" for="ch_12">Parking</label>
                                        </div>

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

    </section>
@endsection
